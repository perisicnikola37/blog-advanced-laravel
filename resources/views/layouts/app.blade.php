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
            <a href="/" class="p-3">Home</a>
        </li>
        <li>
            <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
        </li>
        <li>
            <a href="{{route('posts')}}" class="p-3">Post</a>
        </li>

        @if (Auth::user()->admin == 'true' || Auth::user()->admin == 'TRUE')

        <li>
            <a href="{{route('quotes')}}" class="p-3">Quote</a>
        </li>

        @endif

       </ul>

       <ul class="flex items-center">

        @auth
        <li>
            <a href="{{route('home')}}" class="p-3">{{Auth::user()->name}}</a>
        </li>
        <li>
            <form action="{{route('logout')}}" method="post" class="inline">
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