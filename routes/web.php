<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Home
Route::get('/', function() {

    $quote = Quote::latest('created_at')->first();

    $user = Auth::user();

    return view('home', [
        'quote' => $quote,
        'user' => $user,
    ]);

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
Route::get('/posts', [PostController::class, 'index'])
->name('posts')
->middleware('auth');;
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

// Quotes
Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes');
Route::post('/quotes', [QuoteController::class, 'store']);

// Like
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

// Dislike
Route::delete('/posts/{post}/dislikes', [PostLikeController::class, 'destroy'])->name('posts.dislikes');

// All posts of certaion user
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

// Show single post 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Search
Route::get('/search', [PostController::class, 'search'])->name('search');

Route::get('/user/{user:username}/profile', [UserController::class, 'show'])->name('users.profile');

// For user picture form
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('users.update');

