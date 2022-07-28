@extends('layouts.app')

<title>Home</title>

@section('content')

<div id="loader"></div>

<div style="display:none;" id="myDiv">

<div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-sm">

@if (session()->has('logged-in'))
<div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
    {{session('logged-in')}}
</div>
@endif

@if (session()->has('registered'))
<div class="bg-green-500 p-1 rounded-sm mb-6 text-white text-center">
    {{session('registered')}}
</div>
@endif

<h1 class="font-bold">Welcome back<span class="text-blue-700">{{Auth::check() ? ' ' . Auth::user()->name : ' there!'}}</span></h1>
<p class="mt-2">How are you today..? I have an quote for you, hope you will like it &#128512;</p>
<p class="mt-2 mb-2 text-rose-500">Quote:</p>

@if ($quote)

<p>"{{$quote->body}}" - <span style="font-style: italic">{{$quote->author}}</span></p>

@else

<p>There are no quotes at the moment..</p>

@endif

</div>

</div>

<div class="flex justify-center mt-5">

{{-- <img
class="rounded-lg mb-5" 
src="http://i0.wp.com/joyenergizer.com/wp-content/uploads/2017/05/IceIce.gif?fit=750,563" 
alt=""> --}}

<div class="container">

  @foreach ($posts as $post)
  <div class="card">
    <div class="card__header">
      <img src="{{'/storage/images/posts/' . $post->picture}}" alt="Post Image" class="card__image" width="600">
    </div>
    <div class="card__body">
      {{-- <span class="tag tag-blue">Technology</span> --}}
      <h4><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></h4>
      <p>{!! $post->body !!}</p>
    </div>
    <div class="card__footer">
      <div class="user">
      <img style="height: 40px" 
      src="{{$post->user->picture == "/storage/profile_images/no-picture" ? $post->user->random : $post->user->picture}}"
      alt="User Image" class="user__image">
        <div class="user__info">
          <h5>{{$post->user->name}}</h5>
          <small>{{$post->created_at->diffForHumans()}}</small>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

</div>

<center>

  <div style="margin-bottom: 3%" class="mapouter"><div class="gmap_canvas"><iframe width="800" height="511" id="gmap_canvas" src="https://maps.google.com/maps?q=Podgorica&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com"></a><br><style>.mapouter{position:relative;text-align:right;height:511px;width:800px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:511px;width:800px;}</style></div></div>

</center>


</div>








@endsection