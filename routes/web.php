<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman login (hanya untuk tamu / belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

// Semua halaman berikut wajib login terlebih dahulu
Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Pelanggan, Teknisi, Service (masing-masing sudah mencakup index,
    // create, store, edit, update, destroy secara otomatis)
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('teknisi', TeknisiController::class);
    Route::resource('service', ServiceController::class);

    // Halaman statis
    Route::view('/profile', 'profile')->name('profile');
    Route::view('/about', 'about')->name('about');

    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
});
