@extends('layouts.app')

<title>Log In</title>

@section('content')

<div class="flex justify-center">

  <div class="w-4/12 bg-white p-6 rounded-sm">

  @if (session()->has('status'))

  <div class="bg-red-500 p-1 rounded-sm mb-6 text-white text-center">
    {{session('status')}}
  </div>
      
  @endif

  <p class="text-center mb-5 font-medium">Log In</p>

  <form action="{{route('login')}}" method="post">
  @csrf

  <div class="mb-4">
    <label for="email" class="sr-only">Email address</label>
    <input type="email" name="email" id="email" placeholder="Your email address" class="bg-gray-100 border-2 w-full p-4 rounded-sm @error('name') border-red-500 @enderror" value="{{old('email')}}">

    @error('email')

    <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
    </div>

    @enderror

  </div>

  <div class="mb-4">
    <label for="password" class="sr-only">Pasword</label>
    <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-sm @error('name') border-red-500 @enderror">

    @error('password')

    <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
    </div>

    @enderror

  </div>

  <div class="mb-4">
    <div class="flex items-center">
      <input type="checkbox" name="remember" id="remember" class="mr-1">
      <label for="remember">Remember me</label>
    </div>
  </div>

  <div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Log In</button>
  </div>

  </form>
  
  </div>

</div>
    
@endsection