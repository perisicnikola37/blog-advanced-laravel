@extends('layouts.app')

@section('content')

<div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-sm">

    <x-post :post="$post"></x-post>
  
</div>
</div>
    
@endsection