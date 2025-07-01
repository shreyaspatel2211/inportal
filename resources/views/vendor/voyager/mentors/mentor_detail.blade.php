{{-- @extends('theme::layouts.app') --}}
@extends('voyager::master')
<link rel="stylesheet" href="{{ asset('themes/tailwind/css/app.css') }}">

@section('content')

<div class="max-w-6xl px-5 mx-auto mt-5 sm:mt-10 lg:px-0">

@foreach($mentors as $mentors)
    <div class="sm:flex flex-wrap gap-6">
        <img class="w-32" src="{{ asset('storage/' . $mentors->image) }}" alt="{{ $mentors->name }}" />
        <div class="mt-2 sm:mt-5">
            <h1 class="text-3xl font-bold text-color"> {{ $mentors->name }}</h1>

            <div class="flex flex-wrap gap-6 mt-2">
                <div style="width:312px; height:33px" class="bg-custom-400 rounded-xl ">
                    <div class="flex gap-5 ml-2">
                        {{-- <img style="width: 24px; height:24px;" class="mt-1" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="" /> --}}
                        <h6 class="pt-1 font-bold text-color text-wrap"> {{ $mentors->designation }} </h6>
                    </div>
                </div>

                <div style="width:252px; height:33px" class="bg-custom-400 rounded-xl ">
                    <div class="flex gap-5 ml-2">
                        {{-- <img style="width: 24px; height:24px;" class="mt-1" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="" /> --}}
                        <h6 class="pt-1 font-bold text-color text-wrap"> {{ $mentors->city }}, {{ $mentors->country }} </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">


    <div style="border:2px solid #065367" class="mb-10 mt-10 px-4 py-4 rounded-md">
        {{-- <h4 class="text-color text-xl font-bold ">Mentorship Connection</h4>

        <h5 class="text-color text-md font-bold py-4">Accepting requests from:</h5>

        <div class="flex gap-6">
            <div style="width:136px; height:33px" class="bg-custom-400 rounded-xl ">
                <h6 class="pt-1 font-bold text-md text-color ml-4"> Startup Stage </h6>
            </div>
            <div style="width:136px; height:33px" class="bg-custom-400 rounded-xl ">
                <h6 class="pt-1 font-bold text-md text-color ml-4"> Growth Stage </h6>
            </div>
        </div> --}}

        <h5 class="text-color text-md font-bold pt-6">Benefits</h5>
        {!! $mentors->benifits !!}

        @if($mentors->availabel == 0)
        <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">

        <div style="width:123px; height:33px" class="bg-custom-400 rounded-xl ">
            <h6 class="pt-1 font-bold text-color text-md ml-4"> Unavailable </h6>
        </div>

        <p class="pt-2">You can not connect to the mentor as the mentor has
            reached capacity at this time. Please try again later.</p>
        @endif

    </div>


    <div>
        <h1 class="text-2xl font-bold text-color"> About </h1>
        {!! $mentors->about !!}
    </div>
@endforeach

</div>

@endsection