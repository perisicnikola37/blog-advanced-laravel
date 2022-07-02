@extends('layouts.app')

@section('content')

<div class="flex justify-center">
<div class="w-12/12 bg-white p-6 rounded-sm">


@auth

<form action="{{route('posts')}}" method="post" class="mb-4">
    @csrf

    <div class="mb-4">

        <p class="text-center mb-5 font-medium">Create post</p>

        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-sm @error('body') border-red-500 @enderror" placeholder="Post something..."></textarea>

        @error('body')

        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
            
        @enderror

    </div>

    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium w-full">Post</button>
      </div>

</form>

@if ($posts->count())

@foreach ($posts as $post)

<div class="mb-3">

    <a href="" class="font-bold">
        
        {{$post->user->name}}

    </a>
        <span class="text-gray-400 text-sm">{{$post->created_at->diffForHumans()}}</span>
    
        <p class="mb-2" style="word-break: break-word;">{{$post->body}}</p>

        <div class="flex items-center">
            @if(!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>
          
            @else
            <form action="{{route('posts.dislikes', $post->id)}}" method="post" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
            @endif

            <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>

        </div>

</div>
    
@endforeach

{{$posts->links()}}

@else

<p>There are no posts..</p>
    
@endif
    


@endauth



</div>
    
@endsection