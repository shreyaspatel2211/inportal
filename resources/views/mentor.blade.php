@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto sm:mt-10 mt-5 lg:px-0">

    <div>
        <h1 class="text-5xl font-bold text-color"> mentor</h1>
        <p class="text-balance mt-1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ducimus qui ullam quos non
            fugiat eius perferendis, doloremque eaque laboriosam consequatur
            placeat suscipit dolor odio velit, minus molestias? Doloremque, numquam. </p>
    </div>

    <hr class="bg-color mt-5 sm:mt-10" style="height:1.9px;">

    <div class="flex flex-wrap justify-center gap-6 pt-8">


        @foreach($mentors as $mentor)
        <div class="border-2 rounded-md px-4 py-4 pb-6" style="width:500px;">
            <img class="rounded-full w-24" src="{{ asset('storage/' . $mentor->image) }}" />
            <h3 class="mt-6 text-color font-bold text-2xl">{{ $mentor->name }}</h3>
            <p class="mt-1">{{ Str::limit($mentor->designation, 120) }}</p>

            <a href="{{ route('mentors.show', $mentor->id) }}">
                <button class="ml-auto bg-color font-medium text-white mt-3 px-4 py-2 rounded-md hover:bg-black hover:text-white">
                    View Detail
                </button>
            </a>
        </div>
        @endforeach
    </div>


</div>

@endsection