@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto mt-5 sm:mt-10 lg:px-0">

    <div class="sm:flex flex-wrap gap-6">
        <img class="w-32" src="{{ asset('storage/' . $mentor->image) }}"  />
        <div class="mt-2 sm:mt-5">
            <h1 class="text-3xl font-bold text-color"> {{ $mentor->name }} </h1>

            <div class="flex flex-wrap gap-6 mt-2">
                <div style="width:200px; height:33px" class="bg-custom-400 rounded-xl ">
                    <div class="flex gap-5 ml-2">
                        <h6 class="pt-1 font-bold text-color text-wrap"> {{ $mentor->designation }} </h6>
                    </div>
                </div>

                <div style="width:312px; height:33px" class="bg-custom-400 rounded-xl ">
                    <div class="flex gap-5 ml-2">
                        <h6 class="pt-1 font-bold text-color text-wrap"> {{ $mentor->city }}, {{ $mentor->country }} </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">


    <div style="border:2px solid #065367" class="mb-10 mt-10 px-4 py-4 rounded-md">
        <h5 class="text-color text-md font-bold pt-6">Benefits</h5>
        <p class="pt-1">{!! $mentor->benifits !!}</p>

        <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">

        @if($mentor->available == 1)
        <div style="width:123px; height:33px" class="bg-custom-400 rounded-xl ">
            <h6 class="pt-1 font-bold text-color text-md ml-4"> Available </h6>
        </div>
        @endif
        @if($mentor->available == 0)
        <div style="width:123px; height:33px" class="bg-custom-400 rounded-xl ">
            <h6 class="pt-1 font-bold text-color text-md ml-4"> Unavailable </h6>
        </div>
        <p class="pt-2">You can not connect to the mentor as the mentor has
            reached capacity at this time. Please try again later.</p>
            @endif
        </div>


    <div>
        <h1 class="text-2xl font-bold text-color"> About </h1>
        <p class="mt-2">
            {!! $mentor->about !!}
        </p>
    </div>
</div>

@endsection