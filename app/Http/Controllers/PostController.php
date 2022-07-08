<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    public function index() {

        // First way
        // $posts = Post::all();
        // $posts = Post::get();

        // user and likes relationship
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);

        // new convention
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        $today_posts = Post::whereDate('created_at', Carbon::today())->get();

        $user = Auth::user();
    
        return view('posts.index', [
            'posts' => $posts,
            'user' => $user,
            'today_posts' => $today_posts,
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

    public function edit(Request $request, $id) {

        $post = Post::findOrFail($id);

        $user = Auth::user();

        return view('posts.edit', [
            'user' => $user,
            'post' => $post,
        ]);

    }

    public function update(PostUpdateRequest $request, $id) {

        $input = $request->all();

        $post = Post::findOrFail($id);

        $post->update($input);

        return back()->with('post-updated', 'Your post has been successfully updated!');

    }

    public function show(Post $post) {

        $user = Auth::user();

        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);

    }

    public function destroy(Post $post, Request $request) {

        // 'delete' is the method name inside "PostPolicy"
        $this->authorize('delete', $post);

        $post->delete();

        return back()->with('delete-post', 'You have successfully deleted your post!');

    }

    public function search() {
       
        $user = Auth::user();

        $searched = $_GET['query'];

        $posts = Post::where('title', 'LIKE', '%' . $searched . '%')->latest()->with(['user', 'likes'])->get();

        return view('search', [
            'searched' => $searched,
            'posts' => $posts,
            'user' => $user,
        ]);

    }

}
