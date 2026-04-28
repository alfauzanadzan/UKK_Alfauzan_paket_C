<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| GUEST ROUTES
|--------------------------------------------------------------------------
*/

// LOGIN PAGE
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

// ROOT → LOGIN
Route::get('/', function () {
    return redirect('/login');
});

// LOGIN PROCESS
Route::post('/login', [AuthController::class, 'login'])->name('login.process');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    | DASHBOARD
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    | LOGOUT (FIX PENTING)
    */
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /*
    | BOOKS
    */
    Route::prefix('books')->group(function () {

        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::post('/', [BookController::class, 'store'])->name('books.store');

        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/update/{id}', [BookController::class, 'update'])->name('books.update');

        Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    /*
    | PEMINJAMAN
    */
    Route::prefix('peminjaman')->group(function () {

        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');

        Route::get('/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
        Route::put('/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');

        Route::post('/kembali/{id}', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');

        Route::delete('/delete/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    });

    /*
    | LAPORAN
    */
    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');

    /*
    | USERS
    */
    Route::prefix('users')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');

        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

});