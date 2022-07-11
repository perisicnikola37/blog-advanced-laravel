<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostShowResource;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

class PostControllerAPI extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    
    public function index() {
        // return Post::all();
        return PostCollection::collection(Post::paginate(5));
    }

    public function show(Post $post) {
        return new PostShowResource($post);
    }

    public function store(PostUpdateRequest $request) {
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return response([
            'data' => new PostShowResource($post)
        ], 200);
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());

        return response([
            'data' => new PostShowResource($post)
        ], 200);
    }

    public function destroy(Post $post) {
        $post->delete();

        return response([
            'data' => 'Post has been successfully deleted.'
        ], 200);
    }

}
