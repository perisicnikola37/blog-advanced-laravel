@extends('layouts.app')

<title>User profile page</title>

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-sm">

        @if (session()->has('success-profile'))

            <div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
                {{session('success-profile')}}
            </div>
                  
        @endif

        <h3 class="font-bold">Profile settings <i class="fas fa-cogs"></i></h3>
    
            <form action="{{route('users.update', $user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="mb-6">
                  <label class="block mb-2 mt-4 text-sm font-medium text-blue-700">Your name <span class="text-red-500">*</span></label>
                  <input type="text" id="name" for="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500 @error('name') border-red-500 @enderror" value="{{$user->name}}">
                  @error('name')
                  <p class="mb-2 text-sm">{{$message}}</p>
                  @enderror
                </div>
                <div class="mb-6">
                  <label for="username" class="block mb-2 mt-3 text-sm font-medium text-blue-700">Your username <span class="text-red-500">*</span></label>
                  <input type="text" id="username" for="username" name="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500 @error('username') border-red-500 @enderror" value="{{$user->username}}">
                  @error('username')
                  <p class="mb-2 text-sm">{{$message}}</p>
                  @enderror
                  </div>
                  <div class="mb-6">
                  <label class="block mb-2 mt-4 text-sm font-medium text-blue-700">Your email address <span class="text-red-500">*</span></label>
                  <input type="email" id="email" for="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500 @error('email') border-red-500 @enderror" value="{{$user->email}}">
                  @error('email')
                  <p class="mb-2 text-sm">{{$message}}</p>
                  @enderror
                  </div>
                  <div class="mb-6">
                  <label for="picture" class="block mb-2 mt-3 text-sm font-medium text-blue-700">Your picture</label>
                    
                  <img 
                    class="h-36 mb-3 rounded-t-xl"
                    src="{{$user->picture === "/storage/profile_images/no-picture" ? $user->random : $user->picture}}" 
                    alt="User picture"
                    title="User picture">
      
                  <input type="file" id="picture" for="picture" name="picture" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500">
                  </div>
               

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
              </form>

    </div>
</div>
    
@endsection