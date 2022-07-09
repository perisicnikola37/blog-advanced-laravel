<?php

use App\Http\Controllers\API\PostControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(PostControllerAPI::class)->group(function() {
// Posts index
Route::get('/posts-api', [PostControllerAPI::class, 'index']);
// Posts show
Route::get('/posts/show/{post}', [PostControllerAPI::class, 'show'])
->name('posts.show-api');
});