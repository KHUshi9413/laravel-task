<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
});


Route::get('/manager', [DashboardController::class, 'manager'])
    ->middleware(['auth', 'role:manager'])
    ->name('manager');
Route::get('/userpanel', [DashboardController::class, 'userPanel'])
    ->middleware('auth')
    ->name('user.panel');


Route::resource('/tasks', TaskController::class);
     Route::resource('projects', ProjectController::class);
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');


