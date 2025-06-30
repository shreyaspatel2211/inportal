@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto mt-5 sm:mt-10 lg:px-0">

    <div class="sm:flex flex-wrap gap-6">
        <img class="w-32" src="https://cdn1.vc4a.com/media/2025/06/tom1748969072-290x290.jpeg" alt="" />
        <div class="mt-2 sm:mt-5">
            <h1 class="text-3xl font-bold text-color"> Tom Savory</h1>

            <div class="flex flex-wrap gap-6 mt-2">
                <div style="width:312px; height:33px" class="bg-custom-400 rounded-xl ">
                    <div class="flex gap-5 ml-2">
                        <img style="width: 24px; height:24px;" class="mt-1" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="" />
                        <h6 class="pt-1 font-bold text-color text-wrap"> Principal at Connectivity Capital </h6>
                    </div>
                </div>

                <div style="width:252px; height:33px" class="bg-custom-400 rounded-xl ">
                    <div class="flex gap-5 ml-2">
                        <img style="width: 24px; height:24px;" class="mt-1" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="" />
                        <h6 class="pt-1 font-bold text-color text-wrap"> London, United Kingdom </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">


    <div style="border:2px solid #065367" class="mb-10 mt-10 px-4 py-4 rounded-md">
        <h4 class="text-color text-xl font-bold ">Mentorship Connection</h4>

        <h5 class="text-color text-md font-bold py-4">Accepting requests from:</h5>

        <div class="flex gap-6">
            <div style="width:136px; height:33px" class="bg-custom-400 rounded-xl ">
                <h6 class="pt-1 font-bold text-md text-color ml-4"> Startup Stage </h6>
            </div>
            <div style="width:136px; height:33px" class="bg-custom-400 rounded-xl ">
                <h6 class="pt-1 font-bold text-md text-color ml-4"> Growth Stage </h6>
            </div>
        </div>

        <h5 class="text-color text-md font-bold pt-6">Benefits</h5>
        <p class="pt-2">Two meetings per month</p>
        <p class="pt-1">Unlimited chat, email, or text within boundaries</p>

        <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">

        <div style="width:123px; height:33px" class="bg-custom-400 rounded-xl ">
            <h6 class="pt-1 font-bold text-color text-md ml-4"> Unavailable </h6>
        </div>

        <p class="pt-2">You can not connect to the mentor as the mentor has
            reached capacity at this time. Please try again later.</p>

    </div>


    <div>
        <h1 class="text-2xl font-bold text-color"> About </h1>
        <p class="mt-2">
            Hi, I am Tom, a UK based emerging markets impact investor with many years experience working with African businesses, both from the UK and while living in Tanzania and Nigeria.
            <br> <br>
            My background is emerging markets strategy consulting, including at Boston Consulting Group in Lagos. More recently I work in impact investing, with a focus on internet infrastructure in Africa and South / South East Asia. I have an MBA from Dartmouth College, USA.
            <br> <br>
            I am hoping to be able to help startups on strategy, fundraising and communications primarily from my lens as an investor. I can help you understand what investors want to know about you and your company, and how you can tell them that story.
            <br> <br>
            Active VCs are incentivised to sugar-coat feedback to keep their options open. So it's highly valuable for founders to crowd-source opinions from industry outsiders outside of the fundraising structure. My current investment mandate is highly focussed, and so I can provide an impartial, external voice.
            <br> <br>
            If feedback and advice on your strategy and fundraising materials will be useful, please do get in touch. I'm looking to support founders at Seed and Series A, where I believe I can add most value. My sectoral interests and background are broad, if you are tackling real-world problems, I am interested to help.
        </p>
    </div>

</div>

@endsection