<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


// Rute untuk MENAMPILKAN halaman register (GET)
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// Rute untuk MENAMPILKAN halaman login (GET)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Rute untuk MEMPROSES form register (POST)
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Rute untuk MEMPROSES form login (POST)
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Rute untuk proses logout (POST)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');