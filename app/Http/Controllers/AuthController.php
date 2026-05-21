<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $creadentials = $request->only('email', 'password');
        if (Auth::attempt($creadentials)) {
            // $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'user login successfully!');
        }
            return back()->withErrors([
                'email' => 'Invalid email ',
                'password' => 'Invalid  password',
            ])->onlyInput('password');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been successfully logged out.');
    }
}   