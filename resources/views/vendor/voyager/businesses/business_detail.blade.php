@extends('voyager::master')
<link rel="stylesheet" href="{{ asset('themes/tailwind/css/app.css') }}">

@section('content')
<div class="page bg-">

    <!-- Form Section -->
    <div class="w-full px-4 py-12 pt-10 mt-8">
        <div class="max-w-6xl mx-auto py-10 px-2 rounded-lg">
            <h2 class="text-2xl py-3 rounded-md font-bold text-white bg-color text-center mb-8">Calculate Your Premium</h2>

            <!-- Step Indicators -->
            <div id="stepIndicator" class="sm:flex justify-between bg-color py-3 rounded-md mb-10 text-white font-medium">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="step-indicator step-{{ $i }} text-center flex-1 relative cursor-pointer" onclick="goToStep({{ $i }})">
                    <div class="indicator-circle w-8 h-8 mx-auto rounded-full bg-gray-400 text-white flex items-center justify-center font-bold">{{ $i }}</div>
                    <span class="mt-2 block">
                        @if ($i === 1) Overview
                        @elseif ($i === 2) Team
                        @elseif ($i === 3) Traction
                        @elseif ($i === 4) Fundraising
                        @elseif ($i === 5) Documents
                        @elseif ($i === 6) Impact
                        @endif
                    </span>
            </div>
            @endfor
        </div>

        <!-- Form -->
        <form id="wizardForm">

            <!-- Step 1 -->
            <div class="step" id="step-1">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Company Name</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Founding Date</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Tagline</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Pitch</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Full Address</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Pitch Video</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Phone Number</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Country</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Stage</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Where are your customers based?</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">What type of customers do you have?</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Sectors</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Logo</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Website</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Background Image</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Venture Descripton</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Instagram Link</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">LinkedIn Link</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Facebook Link</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Twitter Link</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Tiktok Link</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Youtube Link</label>
                        <div> hello </div>
                    </div>
                </div>

            </div>

            <!-- Step 2 -->
            <div class="step hidden" id="step-2">
                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

            </div>

            <!-- Step 3 -->
            <div class="step hidden" id="step-3">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

            </div>

            <!-- Step 4 -->
            <div class="step hidden" id="step-4">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

            </div>

            <!-- Step 5 -->
            <div class="step hidden" id="step-5">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

            </div>

            <!-- Step 6 -->
            <div class="step hidden" id="step-6">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> hello </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Your Email</label>
                        <div> <img style="width:30px; height:30px" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="img" /> </div>
                    </div>
                </div>

            </div>

            <!-- Countdown Timer -->
            <div id="countdown" class="text-center mt-4 hidden">
                <p class="text-xl text-white">Next step in: <span id="timer">10</span> seconds</p>
            </div>

        </form>
    </div>
</div>

<!-- JS -->
<script>
    let currentStep = 1;
    const totalSteps = 6;
    let timerInterval;

    // Show current step
    function showStep(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        document.getElementById('step-' + step).classList.remove('hidden');

        document.querySelectorAll('.step-indicator').forEach((el, idx) => {
            const circle = el.querySelector('.indicator-circle');
            if (idx + 1 < step) {
                circle.classList.remove('bg-gray-400');
                circle.classList.add('bg-green-500');
            } else if (idx + 1 === step) {
                circle.classList.remove('bg-gray-400', 'bg-green-500');
                circle.classList.add('bg-blue-500');
            } else {
                circle.classList.remove('bg-green-500', 'bg-blue-500');
                circle.classList.add('bg-gray-400');
            }
        });

        // Start timer when we move to the next step
        //startTimer();
    }

    // Start countdown timer for each step
    function startTimer() {
        const timerElement = document.getElementById('timer');
        let timeLeft = 300000; // 10 seconds countdown
        document.getElementById('countdown').classList.remove('hidden');
        timerElement.textContent = timeLeft;

        clearInterval(timerInterval);
        timerInterval = setInterval(() => {
            timeLeft--;
            timerElement.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                nextStep();
            }
        }, 1000);
    }

    // Move to next step
    function nextStep() {
        currentStep++;
        currentStep = Math.max(1, Math.min(currentStep, totalSteps));
        showStep(currentStep);
    }

    // Go to specific step when clicked
    function goToStep(step) {
        currentStep = step;
        showStep(currentStep);
    }

    document.addEventListener("DOMContentLoaded", function() {
        showStep(currentStep);
    });
</script>

@endsection