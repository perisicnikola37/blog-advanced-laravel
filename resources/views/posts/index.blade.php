@extends('layouts.app')

<title>Posts</title>

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

<x-post :post="$post"></x-post>
    
@endforeach

{{$posts->links()}}

@else

<p>There are no posts..</p>
    
@endif
    


@endauth



</div>
    
@endsection