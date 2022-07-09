<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;



class PostControllerAPI extends Controller
{
    
    public function index() {

        // return Post::all();

        return PostCollection::collection(Post::paginate(5));

    }

}
