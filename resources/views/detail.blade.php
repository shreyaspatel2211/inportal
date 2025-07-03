@extends('theme::layouts.app')

@section('content')
<div class="page bg-">

    <!-- Form Section -->
    <div class="w-full px-4 py-12 pt-10 mt-8">
        <div class="max-w-6xl mx-auto py-10 px-2 rounded-lg">
            <h2 class="text-2xl py-3 rounded-md font-bold text-white bg-color text-center mb-8">Business Detail</h2>

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

        @foreach($business as $business)
        <!-- Form -->
        <form id="wizardForm">

            <!-- Step 1 -->
            <div class="step" id="step-1">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Company Name</label>
                        <div> {{$business->company_name}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block grid justify-end">Founding Date</label>
                        <div> {{$business->founding_date}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Tagline</label>
                        <div> {{$business->tagline}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block justify-end">Pitch</label>
                        @if($business->pitch)
                            <a href="{{ asset('storage/' . $business->pitch) }}" download class="text-blue-500 underline">
                                Download Pitch
                            </a>
                        @else
                            <span>No pitch uploaded</span>
                        @endif
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Full Address</label>
                        <div> {{$business->full_address}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Pitch Video</label>
                        <div> <a href="{{$business->pitch_video_url}}">{{$business->pitch_video_url}}</a> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Phone Number</label>
                        <div> {{$business->phone_number}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Country</label>
                        <div> {{$business->countries}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Stage</label>
                        <div> {{$business->stage}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Where are your customers based?</label>
                        <div> {{$business->where}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">What type of customers do you have?</label>
                        <div> {{$business->what}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Sectors</label>
                        <div> {{$business->sectors}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Logo</label>
                        @if($business->logo)
                            <img src="{{ asset('storage/' . $business->logo) }}" alt="Business Logo" class="w-32 h-auto mt-2">
                        @else
                            <span>No logo uploaded</span>
                        @endif
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Website</label>
                        <div> {{$business->website}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Email</label>
                        <div> {{$business->email}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Background Image</label>
                        {{-- <div> {{$business->background_image}} </div> --}}
                        @if($business->background_image)
                            <img src="{{ asset('storage/' . $business->background_image) }}" alt="Background Image" class="w-32 h-auto mt-2">
                        @else
                            <span>No image uploaded</span>
                        @endif
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Venture Descripton</label>
                        <div> {{$business->description}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Instagram Link</label>
                        <div> <a href="{{$business->instagram}}">{{$business->instagram}}</a> </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">LinkedIn Link</label>
                        <div> <a href="{{$business->linkedin}}">{{$business->linkedin}}</a> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Facebook Link</label>
                        <div> <a href="{{$business->facebook}}">{{$business->facebook}}</a> </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Twitter Link</label>
                        <div> <a href="{{$business->twitter}}">{{$business->twitter}}</a> </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Tiktok Link</label>
                        <div> <a href="{{$business->tiktok}}">{{$business->tiktok}}</a> </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Youtube Link</label>
                        <div> <a href="{{$business->youtube}}">{{$business->youtube}}</a> </div>
                    </div>
                </div>

            </div>

            <!-- Step 2 -->
            <div class="step hidden" id="step-2">
                @php
                    $teamMembers = json_decode($business->team_json);
                @endphp
                @if($teamMembers && count($teamMembers) > 0)
                @foreach($teamMembers as $member)
                    <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                        <div>
                            <label class="text-color text-xl block">Member Name</label>
                            <div> {{ $member->name }} </div>
                        </div>
                        <div class="mt-3 sm:mt-0 text-right">
                            <label class="text-color text-xl block">Designation</label>
                            <div> {{ $member->designation }} </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                        <div class="mt-3 sm:mt-0">
                            <label class="text-color text-xl block">Description</label>
                            <div> {{ $member->description }} </div>
                        </div>
                        <div class="mt-3 sm:mt-0 text-right">
                            <label class="text-color text-xl block">Email</label>
                            <div> {{ $member->email }} </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                        <div class="mt-3 sm:mt-0">
                            <label class="text-color text-xl block">Instagram</label>
                            <div> {{ $member->socials->instagram }} </div>
                        </div>
                        <div class="mt-3 sm:mt-0 text-right">
                            <label class="text-color text-xl block">Facebook</label>
                            <div> {{ $member->socials->facebook }} </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                        <div class="mt-3 sm:mt-0">
                            <label class="text-color text-xl block">Tiktok</label>
                            <div> {{$member->socials->tiktok}} </div>
                        </div>
                        <div class="mt-3 sm:mt-0 text-right">
                            <label class="text-color text-xl block">LinkedIn</label>
                            <div> {{$member->socials->linkedin}} </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                        <div class="mt-3 sm:mt-0">
                            <label class="text-color text-xl block">Twitter</label>
                            <div> {{$member->socials->twitter}} </div>
                        </div>
                        <div class="mt-3 sm:mt-0 text-right">
                            <label class="text-color text-xl block">YouTube</label>
                            <div> {{$member->socials->youtube}} </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @endif
            </div>

            <!-- Step 3 -->
            <div class="step hidden" id="step-3">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Average Monthly Customers</label>
                        <div> {{$business->avg_customer}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Average Monthly Revenue</label>
                        <div> {{$business->avg_revenue}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Average Monthly Expenditure</label>
                        <div> {{$business->avg_expenditure}} </div>
                    </div>
                </div>

            </div>

            <!-- Step 4 -->
            <div class="step hidden" id="step-4">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Are You Raising Funds?</label>
                        <div> {{$business->raising_fund}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color text-xl block">Amount</label>
                        <div> {{$business->amount}} </div>
                    </div>
                </div>

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between sm:mt-6">
                    <div class="mt-3 sm:mt-0">
                        <label class="text-color text-xl block">Type of Funding Preferred</label>
                        <div> {{$business->type_of_funding}} </div>
                    </div>
                    <div class="mt-3 sm:mt-0 text-right">
                        <label class="text-color  text-xl block  grid justify-end">Select Your Funding Rounds</label>
                        <div> {{$business->funding_round}} </div>
                    </div>
                </div>

            </div>

            <!-- Step 5 -->
            <div class="step hidden" id="step-5">
                @php
                    $user = \Illuminate\Support\Facades\Auth::user();
                    $roleId = $user->role_id;
                    $documents = json_decode($business->documents);
                    $categories = collect($documents)->groupBy('category_id');
                    $hasAccess = false;

                    if($roleId == 13){
                        // Check if user is assigned to any dealroom related to this business
                        $hasAccess = \DB::table('dealrooms_users')
                            ->join('deal_rooms', 'dealrooms_users.deal_room_id', '=', 'deal_rooms.id')
                            ->where('dealrooms_users.user_id', $user->id)
                            ->where('deal_rooms.business_id', $business->id)
                            ->exists();
                    }
                @endphp
                @if($roleId == 13 && $hasAccess)
                <div class="max-w-4xl mx-auto">
                    @foreach($categories as $categoryId => $categoryDocs)
                        @php
                            $category_details = \App\Models\DocumentCategory::where('id', $categoryId)->first();
                            
                            $categoryName = "Category " . $categoryId; // Replace with real category name from DB if available
                            $subCategories = collect($categoryDocs)->groupBy('sub_category_id');
                        @endphp

                        <!-- Category Folder -->
                        <div class="mb-4">
                            @if(isset($category_details->title) && !empty($category_details->title))
                                <button type="button" onclick="toggleFolder('cat-{{ $categoryId }}')" class="flex items-center text-xl font-bold text-blue-700">
                                    📁 {{ $category_details->title }}
                                </button>
                            @endif

                            <div id="cat-{{ $categoryId }}" class="ml-6 mt-2 hidden">
                                @foreach($subCategories as $subCategoryId => $subCategoryDocs)
                                    @php
                                        $sub_category_details = \App\Models\DocumentSubCategory::where('id', $subCategoryId)->first();

                                        $subCategoryName = "SubCategory " . $subCategoryId; // Replace with real subcategory name from DB if available
                                    @endphp

                                    <!-- Sub-Category Folder -->
                                    <div class="mb-2">
                                        @if(isset($sub_category_details->title) && !empty($sub_category_details->title))
                                        <button type="button" onclick="toggleFolder('subcat-{{ $categoryId }}-{{ $subCategoryId }}')" class="flex items-center text-lg text-green-700 mr-5">
                                            📂 {{ $sub_category_details->title }}
                                        </button>
                                        @endif

                                        <div id="subcat-{{ $categoryId }}-{{ $subCategoryId }}" class="ml-6 mt-1 hidden">
                                            @foreach($subCategoryDocs as $doc)
                                                @if(isset($doc->download_url) && !empty($doc->download_url))
                                                <div>
                                                    📄 
                                                    <a href="{{ asset($doc->download_url) }}" download class="text-blue-500 underline">
                                                        {{ $doc->document_name }}
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                @elseif($roleId == 13)
                <p class="text-danger text-center" style="color:red;"> Currently, You do not have access the documents.</p>
                @else<div class="max-w-4xl mx-auto">
                    @foreach($categories as $categoryId => $categoryDocs)
                        @php
                            $category_details = \App\Models\DocumentCategory::where('id', $categoryId)->first();
                            
                            $categoryName = "Category " . $categoryId; // Replace with real category name from DB if available
                            $subCategories = collect($categoryDocs)->groupBy('sub_category_id');
                        @endphp

                        <!-- Category Folder -->
                        <div class="mb-4">
                            @if(isset($category_details->title) && !empty($category_details->title))
                                <button type="button" onclick="toggleFolder('cat-{{ $categoryId }}')" class="flex items-center text-xl font-bold text-blue-700">
                                    📁 {{ $category_details->title }}
                                </button>
                            @endif

                            <div id="cat-{{ $categoryId }}" class="ml-6 mt-2 hidden">
                                @foreach($subCategories as $subCategoryId => $subCategoryDocs)
                                    @php
                                        $sub_category_details = \App\Models\DocumentSubCategory::where('id', $subCategoryId)->first();

                                        $subCategoryName = "SubCategory " . $subCategoryId; // Replace with real subcategory name from DB if available
                                    @endphp

                                    <!-- Sub-Category Folder -->
                                    <div class="mb-2">
                                        @if(isset($sub_category_details->title) && !empty($sub_category_details->title))
                                        <button type="button" onclick="toggleFolder('subcat-{{ $categoryId }}-{{ $subCategoryId }}')" class="flex items-center text-lg text-green-700 mr-5">
                                            📂 {{ $sub_category_details->title }}
                                        </button>
                                        @endif

                                        <div id="subcat-{{ $categoryId }}-{{ $subCategoryId }}" class="ml-6 mt-1 hidden">
                                            @foreach($subCategoryDocs as $doc)
                                                @if(isset($doc->download_url) && !empty($doc->download_url))
                                                <div>
                                                    📄 
                                                    <a href="{{ asset($doc->download_url) }}" download class="text-blue-500 underline">
                                                        {{ $doc->document_name }}
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif

            </div>

            <!-- Step 6 -->
            <div class="step hidden" id="step-6">

                <div class="max-w-4xl mx-auto sm:flex gap-6 justify-between ">
                    <div>
                        <label class="text-color text-xl block">Impact</label>
                        <div> {!!$business->impact!!} </div>
                    </div>
                </div>

            </div>

            <!-- Countdown Timer -->
            <div id="countdown" class="text-center mt-4 hidden">
                <p class="text-xl text-white">Next step in: <span id="timer">10</span> seconds</p>
            </div>

        </form>
        @endforeach
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

<script>
    function toggleFolder(id) {
        const element = document.getElementById(id);
        if (element) {
            element.classList.toggle('hidden');
        }
    }
</script>


@endsection