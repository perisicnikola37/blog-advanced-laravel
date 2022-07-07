@extends('layouts.app')

<title>Home</title>

@section('content')


<div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-sm">

@if (session()->has('logged-in'))
<div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
    {{session('logged-in')}}
</div>
@endif

<h1 class="font-bold">Welcome back<span class="text-blue-700">{{Auth::check() ? ' ' . Auth::user()->name : ' there!'}}</span></h1>
<p class="mt-2">How are you today..? I have an quote for you, hope you will like it &#128512;</p>
<p class="mt-2 mb-2 text-rose-500">Quote:</p>
{{-- <select name="select" id="select">
    <option value="">Choose category</option>
    <option value="">Motivation</option>
    <option value="">Success</option>
    <option value="">Love</option>
    <option value="">Money</option>
</select> --}}

@if ($quote)

<p>"{{$quote->body}}" - <span style="font-style: italic">{{$quote->author}}</span></p>

@else

<p>There are no quotes at the moment..</p>

@endif

</div>

</div>

<div class="flex justify-center mt-5">

<img
class="rounded-lg mb-5" 
src="https://cms-assets.tutsplus.com/cdn-cgi/image/width=850/uploads/users/988/posts/30254/image/website-homepage%20(1).jpg" 
alt="">

</div>

@endsection