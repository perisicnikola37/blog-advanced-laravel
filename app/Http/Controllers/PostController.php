<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index() {

        // First way
        // $posts = Post::all();
        // $posts = Post::get();

        // user and likes relationship
        $posts = Post::with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    public function store(PostRequest $request) {
        
        $input = $request->all();

        // Using External Request
        // $this->validate($request, [
        //     'body' => 'required|min:2|max:255',
        // ]);

        // Using Relationship insted of this
        // Post::create([
        //     'user_id' => auth()->user()->id,
        //     'body' => $request->body,
        // ]);

        auth()->user()->posts()->create($input);

        return back();

    }

    public function destroy(Post $post, Request $request) {
        
        $post->delete();

        return back();

    }

}
