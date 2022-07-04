@extends('layouts.app')

<title>Register</title>

@section('content')

<div class="flex justify-center">

  <div class="w-4/12 bg-white p-6 rounded-sm">

  <p class="text-center mb-5 font-medium">Register</p>

  <form action="{{route('register')}}" method="post">
  @csrf

  <div class="mb-4">
    <label for="name" class="sr-only">Name</label>
    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-sm @error('name') border-red-500 @enderror" value="{{old('name')}}">

    @error('name')

    <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
    </div>

    @enderror

  </div>

  <div class="mb-4">
    <label for="username" class="sr-only">Username</label>
    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-sm @error('name') border-red-500 @enderror" value="{{old('username')}}">

    @error('username')

    <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
    </div>

    @enderror

  </div>

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
    <label for="password_confirmation" class="sr-only">Pasword Confirm</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-sm @error('name') border-red-500 @enderror">

    @error('password_confirmation')

    <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
    </div>

    @enderror

  </div>

  <div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
  </div>

  </form>
  
  </div>

</div>
    
@endsection