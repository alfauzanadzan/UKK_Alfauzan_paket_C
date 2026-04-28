<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // 🔥 sudah pasti ada kalau pakai middleware auth

        if ($user->role === 'admin') {
            return view('dashboard.admin');
        }

        if ($user->role === 'petugas') {
            return view('dashboard.petugas');
        }

        if ($user->role === 'peminjam') {
            return redirect('/peminjaman');
        }

        abort(403);
    }
}