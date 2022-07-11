<?php

use App\Http\Controllers\API\PostControllerAPI;
use App\Http\Controllers\API\QuoteControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PostControllerAPI::class)->group(function() {
// Posts index
Route::get('/posts', [PostControllerAPI::class, 'index']);
// Posts show
Route::get('/posts/show/{post}', [PostControllerAPI::class, 'show'])
->name('posts.show-api');
// Posts store
Route::post('/posts/store', [PostControllerAPI::class, 'store'])
->name('posts.store-api');
// Posts update
Route::put('/posts/update/{post}', [PostControllerAPI::class, 'update'])
->name('posts.update-api');
// Posts destroy
Route::delete('/post/delete/{post}', [PostControllerAPI::class, 'destroy'])
->name('posts.destroy-api');
});

Route::controller(QuoteControllerAPI::class)->group(function() {
// Quotes index
Route::get('quotes', [QuoteControllerAPI::class, 'index']);
// Quotes show
Route::get('/quotes/show/{quote}', [QuoteControllerAPI::class, 'show'])
->name('quotes.show-api');
// Quotes store
Route::post('/quotes/store', [QuoteControllerAPI::class, 'store'])
->name('quotes.store-api');
// Quotes update
Route::put('/quotes/update/{quote}', [QuoteControllerAPI::class, 'update'])
->name('quotes.update-api');
// Quotes destroy
Route::delete('/quote/delete/{quote}', [QuoteControllerAPI::class, 'destroy'])
->name('quotes.destroy-api');
});

