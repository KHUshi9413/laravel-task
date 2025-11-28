<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        
        if ($user->role === 'admin') {
            return $next($request);
        }

        
        if (!in_array($user->role, $roles)) {
            
            return redirect('/dashboard')->with('error', '🚫 You do not have permission to access this section.');
        }

        return $next($request);
    }
}
