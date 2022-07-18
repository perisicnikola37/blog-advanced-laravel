@extends('layouts.app')

<title>Quotes</title>

@section('content')

<div id="loader"></div>

<div style="display:none;" id="myDiv">

<div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-sm">

    @if (session()->has('success-quote'))

    <div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
      {{session('success-quote')}}
    </div>
        
    @endif

<form action="{{route('quotes')}}" method="post" class="mb-4">
    @csrf

    <div class="mb-4">

        <h3 class="mb-4 font-bold">Write your quote <i class="fas fa-quote-right"></i></h3>

        @error('author')
        <p class="mb-2">{{$message}}</p>
        @enderror
        <input 
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('author') border-red-500 @enderror" 
        id="author" 
        name="author"
        type="text" 
        placeholder="Author's name"
        value="{{old('author')}}">

        <br> <br> 

        @error('body')
        <p class="mb-2">{{$message}}</p>
        @enderror
        <textarea 
        name="body" 
        id="body" 
        cols="30" 
        rows="4" 
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline p-4 rounded-sm @error('body') border-red-500 @enderror" placeholder="Content..."
        value="{{old('body')}}"></textarea>
        
        

    </div>

    <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post</button>
      </div>

</form>

</div>

</div>

    
@endsection

{{-- Refresh alert --}}
<script type="text/javascript" src="{{asset('js/refresh_alert/refresh_alert.js')}}"></script>
