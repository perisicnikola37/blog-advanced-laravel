<?php

use App\Http\Controllers\API\PostControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PostControllerAPI::class)->group(function() {
// Posts index
Route::get('/posts-api', [PostControllerAPI::class, 'index']);
// Posts show
Route::get('/posts/show/{post}', [PostControllerAPI::class, 'show'])
->name('posts.show-api');
// Posts stores
Route::post('/posts/store', [PostControllerAPI::class, 'store'])
->name('posts.store-api');
// Posts update
Route::put('/posts/update/{post}', [PostControllerAPI::class, 'update'])
->name('posts.update-api');
// Posts destroy
Route::delete('/posts/delete/{post}', [PostControllerAPI::class, 'destroy'])
->name('posts.destroy-api');
});


