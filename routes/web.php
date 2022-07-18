<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use App\Models\Post;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Redirect
Route::get('/', [HomeController::class, 'redirect']);

// Home
Route::get('/home', function() {
    $quote = Quote::latest('created_at')->first();
    $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
    $user = Auth::user();

    return view('home', [
        'quote' => $quote,
        'user' => $user,
        'posts' => $posts,
    ]);
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

Route::controller(RegisterController::class)->group(function() {
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
});

Route::controller(LoginController::class)->group(function() {
// Log In
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
});

// Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::controller(QuoteController::class)->group(function() {
// Quotes index
Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes');
// Quotes store
Route::post('/quotes', [QuoteController::class, 'store']);
});

Route::controller(PostLikeController::class)->group(function() {
// Like
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
// Dislike
Route::delete('/posts/{post}/dislikes', [PostLikeController::class, 'destroy'])->name('posts.dislikes');
});

// All posts of a certain user
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::controller(PostController::class)->group(function() {
// Posts index
Route::get('/posts', [PostController::class, 'index'])
->name('posts')
->middleware('auth');
// Posts store
Route::post('/posts', [PostController::class, 'store']);
// Posts delete
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
// Show single post 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Search
Route::get('/search', [PostController::class, 'search'])->name('search');
// Posts edit
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Posts update
Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
});

Route::controller(UserController::class)->group(function() {
// User profile
Route::get('/user/{user:username}/profile', [UserController::class, 'show'])->name('users.profile');
// Users edit
Route::put('/user/{id}/update', [UserController::class, 'update'])->name('users.update');
});

