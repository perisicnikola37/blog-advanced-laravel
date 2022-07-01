<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function() {

    return view('home');

})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/posts', function () {
    return view('posts.index');
});
