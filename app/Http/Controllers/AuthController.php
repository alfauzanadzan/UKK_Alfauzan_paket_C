<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // LOGIN FORM
    public function loginForm()
    {
        return view('login');
    }

    // LOGIN PROCESS
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // SEMUA ROLE KE DASHBOARD (BIAR AMAN PRESENTASI)
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}