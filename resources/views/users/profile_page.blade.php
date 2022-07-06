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
    
            <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-6">
                  <label for="name" class="block mb-2 mt-4 text-sm font-medium text-blue-700">Your name</label>
                  <input type="text" id="name" for="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500" value="{{$user->name}}">
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 mt-3 text-sm font-medium text-blue-700">Your username</label>
                    <input type="text" id="username" for="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500" value="{{$user->username}}">
                  </div>
                  <div class="mb-6">
                    <label for="email" class="block mb-2 mt-3 text-sm font-medium text-blue-700">Your email</label>
                    <input type="text" id="email" for="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500" value="{{$user->email}}">
                  </div>
                  <div class="mb-6">
                    <label for="picture" class="block mb-2 mt-3 text-sm font-medium text-blue-700">Your picture</label>
                    <img 
                    class="h-36 mb-3 rounded-t-xl"
                    src="{{$user->picture}}" 
                    alt="">
                    <input type="file" id="picture" for="picture" name="picture" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-red-500">
                  </div>
               

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
              </form>

    </div>
</div>
    
@endsection