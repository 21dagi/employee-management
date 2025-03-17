<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.register');
    }
    public function home()
    {
        return view('landing_page.landing_dashboard');
    }

    public function logincheck(Request $request): RedirectResponse
    {
        // Validate the request data
        $credentials = $request->validate([
            'name' => 'required|string', // Validate username
            'password' => 'required',
        ]);

        // Attempt to authenticate the user using username
        if (Auth::attempt(['username' => $credentials['name'], 'password' => $credentials['password']])) {
            // Authentication successful
            $user = Auth::user();

            // Check the user's role and redirect accordingly
            if ($user->role_id === 1) { // Assuming role_id 1 is for admin
                return redirect()->route('dashboard'); // Redirect to admin dashboard
            } elseif ($user->role_id === 2) { // Assuming role_id 2 is for user
                return redirect()->route('user.profile'); // Redirect to user dashboard
            }
        }

        // Authentication failed
        return redirect()->route('home')->with('error', 'Invalid credentials');
    }
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to home or login page
    }
}