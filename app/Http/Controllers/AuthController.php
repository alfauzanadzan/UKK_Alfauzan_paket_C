<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ====================
    // HALAMAN LOGIN
    // ====================
    public function loginForm()
    {
        return view('login');
    }

    // ====================
    // PROSES LOGIN
    // ====================
    public function login(Request $request)
    {
        // 🔥 validasi dulu
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // 🔥 attempt login
        if (Auth::attempt($credentials)) {

            // 🔥 WAJIB (biar session kebaca)
            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 redirect sesuai role
            if ($user->role === 'peminjam') {
                return redirect()->intended('/peminjaman');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // ====================
    // LOGOUT
    // ====================
    public function logout(Request $request)
    {
        Auth::logout();

        // 🔥 bersihin session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}