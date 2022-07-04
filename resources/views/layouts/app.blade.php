<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    {{-- Icon --}}
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png">
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-200">
    
    <nav class="p-6 bg-white flex justify-between mb-6">
       <ul class="flex items-center">
        <li>
            <a style="transition: 0.25s" href="/" class="p-2 rounded-sm
            
            {{ (request()->is('/')) ? 'border-b-2 border-indigo-500' : '' }}

            ">Home</a>
        </li>
        
        <li>
            <a href="{{route('dashboard')}}" class="p-2 
            
            {{ (request()->is('dashboard')) ? 'border-b-2 border-indigo-500' : '' }}

            ">Dashboard</a>
        </li>

        <li>
            <a href="{{route('posts')}}" class="p-2 
            
            {{ (request()->is('posts')) ? 'border-b-2 border-indigo-500' : '' }}

            ">Post</a>
        </li>

        @auth
        
        @if (Auth::user()->admin == 'true' || Auth::user()->admin == 'TRUE')

        <li>
            <a href="{{route('quotes')}}" class="p-2 
            
            {{ (request()->is('quotes')) ? 'border-b-2 border-indigo-500' : '' }}

            ">Quote</a>
        </li> 

        @endif

        @endauth

       </ul>

       <ul class="flex items-center">

        @auth
        <li>
            <a href="{{route('home')}}" class="p-3">{{Auth::user()->name}}</a>
        </li>
        <li>
            <form action="{{route('logout')}}" method="post" class="inline p-2 bg-blue-400 hover:bg-sky-700 text-white rounded-sm">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
        @endauth

        @guest
        <li>
            <a href="{{route('login')}}" class="p-3">Log In</a>
        </li>
        <li>
            <a href="{{route('register')}}" class="p-3">Register</a>
        </li>
        @endguest
        
       </ul>
    </nav>

@yield('content')




</body>

</html>