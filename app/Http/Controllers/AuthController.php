<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Security enhancements
    protected $maxAttempts = 5; // Max login attempts
    protected $decayMinutes = 15; // Lockout duration

    public function login()
    {
        return view('login.register');
    }

    public function home()
    {
        return view('landing_page.landing_dashboard');
    }

    public function logincheck(Request $request)
    {
        $this->checkTooManyFailedAttempts($request);
    
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['username' => $credentials['name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            RateLimiter::clear($this->throttleKey($request));
            
            // Store user role in session
            $request->session()->put('user_role', Auth::user()->role_id);
            
            // Check role and redirect
            $user = Auth::user();
            if ($user->role_id === 1) {
                return redirect()->intended(route('dashboard'));
            } elseif ($user->role_id === 2) {
                return redirect()->intended(route('user.profile'));
            }
        }
    
        RateLimiter::hit($this->throttleKey($request), $this->decayMinutes * 60);
        return redirect()->route('login.signin')
            ->with('error', 'Invalid credentials')
            ->withInput($request->except('password'));
    }
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            Log::info('User logged out', [
                'user_id' => Auth::id(),
                'ip' => $request->ip()
            ]);
        }
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Add cache control headers
        return redirect('/')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
    /**
     * Security enhancement methods
     */
    protected function checkTooManyFailedAttempts(Request $request): void
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), $this->maxAttempts)) {
            $seconds = RateLimiter::availableIn($this->throttleKey($request));
            
            throw ValidationException::withMessages([
                'name' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60)
                ])
            ]);
        }
    }

    protected function throttleKey(Request $request): string
    {
        return Str::lower($request->input('name')).'|'.$request->ip();
    }
}