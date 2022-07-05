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
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    public function store(PostRequest $request) {
        
        $input = $request->all();

        // Using External Request
        // $this->validate($request, [
        //     'title' => 'required|min:2|max:255|alpha',
        //     'body' => 'required|min:10|max:255|alpha',
        // ]);

        // Using Relationship insted of this
        // Post::create([
        //     'user_id' => auth()->user()->id,
        //     'body' => $request->body,
        // ]);

        auth()->user()->posts()->create($input);

        return back()->with('success-post', 'You have successfully published your post!');
    }

    public function show(Post $post) {

        return view('posts.show', [
            'post' => $post,
        ]);

    }

    public function destroy(Post $post, Request $request) {

        // 'delete' is the method name inside "PostPolicy"
        $this->authorize('delete', $post);

        $post->delete();

        return back()->with('delete-post', 'You have successfully deleted your post!');

    }

    public function search() {
       
        $searched = $_GET['query'];

        $posts = Post::where('title', 'LIKE', '%' . $searched . '%')->get();

        return view('search', compact('posts', 'searched'));

    }

}
