@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto sm:mt-10 mt-5 lg:px-0">

    <style>
        #menu a {
            text-decoration: none;
            color: inherit;
            outline: none;
        }

        /* Style when clicking or focusing */
        #menu a:focus,
        #menu a:active {
            text-decoration: underline;
            color: black;
        }

        /* Style for default active item */
        #menu a.active {
            text-decoration: underline;
            color: black;
            font-weight: bold;
        }
    </style>

    <div class="sm:flex gap-6">
        {{-- <img src="https://media.istockphoto.com/id/1313843101/vector/blue-logistics-logo-with-lines-highway-vector.jpg?s=612x612&w=0&k=20&c=8mueJQSnrwO6Mr-oRp12v3drokq1RJJZj6PWvmFjmWY=" alt="img" width="100px" /> --}}
        <div class="mt-3 sm:mt-0">
            <h1 class="text-2xl font-bold text-color">{{ $programs->program_name }}</h1>
            <p class="text-balance">Start Date : {{ $programs->program_start_date }} <br> End Date : {{ $programs->program_end_date }}</p>
            <div class="flex gap-5">
                <form action="{{ route('programss.apply', $programs->id) }}" method="GET" class="ml-4">
                        @csrf
                        <button type="submit" class="bg-color font-medium text-white mt-3 px-4 py-2 rounded-md hover:bg-black hover:text-white">
                            Apply Now
                        </button>
                    </form>
                {{-- <button class="bg-color font-medium py-1 text-white mt-2 px-4 rounded-md hover:bg-black hover:text-white">Fundraising</button> --}}
                {{-- <img style="width: 28px; height:28px;" class="mt-2" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="" /> --}}
                {{-- <img style="width: 28px; height:28px;" class="mt-2" src="{{ asset('themes/tailwind/images/fec.png')}}" alt="" /> --}}
                {{-- <img style="width: 28px; height:28px;" class="mt-2" src="{{ asset('themes/tailwind/images/loc.png')}}" alt="" /> --}}
            </div>
        </div>
    </div>
    <hr class="bg-color mt-5 sm:mt-10" style="height:1.9px;">

    <div class="sm:flex sm:mt-10 mt-5">

        <ul id="menu">
            <li class="group font-semibold sm:text-2xl text-xl text-color rounded-md hover:bg-color cursor-pointer underline" data-target="Overview">
                <a href="#Overview" class="group-hover:text-white block px-2 sm:py-2 py-1">Overview</a>
            </li>
            
        </ul>

        <div id="Overview" class="section  mt-6 sm:mt-0 "style="margin-left:50px" >
            <img style="width:100%  ; height:400px" src="{{ asset('storage/' . $programs->image) }}" alt="img" />
            <p class="mt-10 text-balance"> {!! $programs->description !!} </p>
        </div>
    </div>



</div>




<script>
    // Wait for DOM load
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.getElementById("menu");
        const sections = document.querySelectorAll(".section");

        menu.addEventListener("click", (e) => {
            e.preventDefault();

            // Find the <li> clicked or its child <a>
            let targetLi = e.target.closest("li[data-target]");
            if (!targetLi) return;

            let targetId = targetLi.getAttribute("data-target");

            // Hide all sections
            sections.forEach(section => {
                section.style.display = "none";
            });

            // Show target section
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.style.display = "block";

                // Smooth scroll to the section top
                targetSection.scrollIntoView({
                    behavior: "smooth"
                });
            }
        });
    });
</script>



@endsection