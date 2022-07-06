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


<div>
            
        
    <form class="flex items-center" action="{{route('search')}}" method="GET">   

        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="query" name="query" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
    </form>


</div>


<form action="{{route('posts')}}" method="post" class="mb-4">
    @csrf

    <div class="mb-4">

        <p class="mb-5 font-medium text-2xl">Create post</p>

        @error('title')
        <p class="mb-2">{{$message}}</p>
        @enderror
        <input 
        type="text" 
        id="title" 
        name="title"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline p-4 rounded-sm @error('title') border-red-500 @enderror" 
        placeholder="Enter your title..."
        value="{{old('title')}}" >

        <br>
        <br>

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