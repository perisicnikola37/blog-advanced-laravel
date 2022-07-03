<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
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

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');


// Like
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');


// Dislike
Route::delete('/posts/{post}/dislikes', [PostLikeController::class, 'destroy'])->name('posts.dislikes');




Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

