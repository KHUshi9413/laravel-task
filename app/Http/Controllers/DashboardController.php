<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('task1.dashboard', ['user' => Auth::user()]);
    }

    public function admin()
    {
        return view('dashboard');
    }

    public function manager()
    {
        return view('task1.manager');
    }

    public function userPanel()
    {
        return view('task1.user');
    }

}
