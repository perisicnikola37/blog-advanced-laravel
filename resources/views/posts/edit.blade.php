@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-sm">

        @if (session()->has('post-updated'))

        <div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
            {{session('post-updated')}}
        </div>
            
        @endif

        <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="mb-6">
                  <label class="block mb-2 mt-4 text-sm font-medium text-blue-700">Post Title <span class="text-red-500">*</span></label>
                  <input type="text" id="title" for="title" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500 @error('title') border-red-500 @enderror" value="{{$post->title}}">
                  @error('title')
                  <p class="mb-2 text-sm">{{$message}}</p>
                  @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 mt-4 text-sm font-medium text-blue-700">Post Content <span class="text-red-500">*</span></label>

                  <textarea 
                    name="body" 
                    id="myeditorinstance" 
                    rows="1"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500 @error('body') border-red-500 @enderror" value="{!! $post->body !!}">
                  {!! $post->body !!}
                  </textarea>
                  </div>
               
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save changes</button>
              </form>


    </div>
</div>
    
@endsection