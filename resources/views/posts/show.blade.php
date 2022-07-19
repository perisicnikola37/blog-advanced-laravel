@extends('layouts.app')

@section('content')

<div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-sm">

    <x-post :post="$post"></x-post>

    <div class="inline-flex">
        <button onclick="history.back()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Back
          </button>
    </div>

</div>
</div>
    
@endsection