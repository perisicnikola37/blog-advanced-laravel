@extends('layouts.app')

<title>Posts</title>

@section('content')

<div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-sm">


    @if (session()->has('success-post'))

    <div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
        {{session('success-post')}}
    </div>
          
    @endif

    @if (session()->has('delete-post'))

    <div class="bg-red-500 p-1 rounded-sm mb-6 text-white text-center">
        {{session('delete-post')}}
    </div>

    @endif


@auth

<form action="{{route('posts')}}" method="post" class="mb-4">
    @csrf

    <div class="mb-4">

        <p class="text-center mb-5 font-medium">Create post</p>

        <label for="body" class="sr-only">Body</label>

        @error('body')
        <p class="mb-2">{{$message}}</p>
        @enderror
        <textarea 
        name="body" 
        id="body" 
        cols="30" 
        rows="4" 
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline p-4 rounded-sm @error('body') border-red-500 @enderror" placeholder="Post something..."
        value="{{old('body')}}"></textarea>

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