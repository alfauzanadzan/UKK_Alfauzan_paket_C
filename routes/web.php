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
| GUEST
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    | DASHBOARD
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    | LOGOUT
    */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | BOOKS (ADMIN + PETUGAS)
    |--------------------------------------------------------------------------
    */
    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::post('/', [BookController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BookController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('delete');
    });

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN (FULL CRUD)
    |--------------------------------------------------------------------------
    */
    Route::prefix('peminjaman')->name('peminjaman.')->group(function () {

        Route::get('/', [PeminjamanController::class, 'index'])->name('index');
        Route::post('/store', [PeminjamanController::class, 'store'])->name('store');

        // EDIT
        Route::get('/edit/{id}', [PeminjamanController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PeminjamanController::class, 'update'])->name('update');

        // RETURN BOOK
        Route::post('/kembali/{id}', [PeminjamanController::class, 'kembali'])->name('kembali');

        // DELETE
        Route::delete('/delete/{id}', [PeminjamanController::class, 'delete'])->name('delete');
    });

    /*
    |--------------------------------------------------------------------------
    | USER MANAGEMENT (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    Route::prefix('users')->name('users.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');

        // EDIT USER
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });

});