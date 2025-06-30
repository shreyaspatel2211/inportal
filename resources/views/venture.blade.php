@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto sm:mt-10 mt-5 lg:px-0">


    <div>
        <div class="mt-10">
            <h1 class="pt-5 text-5xl font-bold text-color"> Explore Ventures </h1>
        <a href="{{ route('ventures.create') }}">
        <button class="ml-auto bg-color font-medium text-white mt-3 px-4 py-2 rounded-md hover:bg-black hover:text-white">
            Add your Venture
        </button>
    </a>
    <p class="text-balance mt-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae nulla dolorum architecto autem cum accusamus ea explicabo facere possimus,
                repudiandae illum cumque veniam aperiam odit animi fuga necessitatibus. Autem, voluptatem!</p>
        </div>
    </div>  
    <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">

    <div>
        <h1 class="text-color text-xl font-bold text-center"> Trending ventures </h1>
        <div class="flex flex-wrap justify-center gap-6 mt-5">
        @php
            $approvedBusinesses = $businesses->where('status', 'Approved');
        @endphp

        @if ($approvedBusinesses->count() > 0)
            @foreach($approvedBusinesses as $business)
                <div class="border-2 rounded-md" style="width:450px;">
                    <img style="width:450px; height:200px" src="{{ asset('storage/' . $business->background_image) }}" alt="img" />
                    
                    <div class="flex mt-5 px-4">
                        <img style="width:110px; height:50px" src="{{ asset('storage/' . $business->logo) }}" alt="img" />
                        <button style="height:28px" class="ml-auto bg-color font-medium text-white mt-3 px-4 rounded-md hover:bg-black hover:text-white">
                            Fundraising
                        </button>
                    </div>

                    <div class="px-4 my-5">
                        <h1 class="text-xl font-bold text-color">{{ $business->company_name }}</h1>
                        <p>{{ $business->tagline }}</p>
                    </div>

                    <div class="px-4 flex pt-2 pb-5">
                        <a href="{{ route('venture.show', $business->id) }}">
                            <button class="ml-auto bg-color font-medium text-white mt-3 px-4 py-2 rounded-md hover:bg-black hover:text-white">
                                View Details
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
        <p class="text-red-600 font-semibold text-lg mt-4">Your status is not approved yet.</p>
@endif




</div>








@endsection