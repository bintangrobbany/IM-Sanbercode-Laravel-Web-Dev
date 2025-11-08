<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController; // Tambahkan ProfileController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama setelah login
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Semua rute otentikasi (login, register, logout) dari Breeze
require __DIR__ . '/auth.php';

// Grup rute yang hanya bisa diakses oleh ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});

// Grup rute yang bisa diakses oleh ADMIN dan STAFF
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
});

// Grup rute untuk semua pengguna yang sudah login
Route::middleware('auth')->group(function () {
    // Rute untuk menampilkan dan menyimpan profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});