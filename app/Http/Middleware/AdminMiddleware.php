<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Added missing import

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login.signin')->with('error', 'Please login first');
        }
    
        $user = Auth::user();
        if ($user->role_id === 1) { // 1 = admin role
            return $next($request);
        }
    
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/')->with('error', 'Administrator access required');
    }
}