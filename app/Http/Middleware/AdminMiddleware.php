<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   if (Auth::check() && Auth::user()->role_id === 1) { // Assuming role_id 1 is for admin
        return $next($request);
    }

        else{
            Auth::logout();
            return redirect(url(''));
        }
    }
}
