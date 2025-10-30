<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web". Buat sesuatu yang hebat!
|
*/

// Route untuk halaman utama (Home)
Route::get('/', [DashboardController::class, 'index']);

// Route untuk menampilkan halaman registrasi
Route::get('/register', [FormController::class, 'register']);

// Route untuk memproses data dari form registrasi dan menampilkan halaman selamat datang
Route::post('/welcome', [FormController::class, 'welcome']);

