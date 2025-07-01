@extends('theme::layouts.app')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('content')

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

    <div class="page bg-">

        <!-- Form Section -->
        <div class="w-full px-4 py-12 pt-10 mt-8">
            <div class="max-w-6xl mx-auto py-10 px-2 rounded-lg">
                <h2 class="text-2xl py-3 rounded-md font-bold text-white bg-color text-center mb-8">Add Your Business</h2>

                <!-- Step Indicators -->
                <div id="stepIndicator" class="sm:flex justify-between bg-color py-3 rounded-md mb-10 text-white font-medium">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="step-indicator step-{{ $i }} text-center flex-1 relative">
                            <div
                                class="indicator-circle w-8 h-8 mx-auto rounded-full bg-gray-400 text-white flex items-center justify-center font-bold">
                                {{ $i }}</div>
                            <span class="mt-2 block">
                                @if ($i === 1)
                                    Overview
                                @elseif ($i === 2)
                                    Team
                                @elseif ($i === 3)
                                    Finance
                                @elseif ($i === 4)
                                    Fundraising
                                @elseif ($i === 5)
                                    Documents
                                @elseif ($i === 6)
                                    Impact
                                @endif
                            </span>
                        </div>
                    @endfor
                </div>

                <!-- Form -->
                <form id="wizardForm" action="{{ route('submit.venture') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Step 1 -->
                    <div class="step" id="step-1">
                        <div class="sm:flex gap-6 justify-between">
                            <div class="w-full">
                                <div class="w-full">
                                    <label class="text-color text-xl block">Company Name </label>
                                    <input type="text" id="company_name" name="company_name" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('company_name'))
                                        <span class="text-red-500">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                                <div class="w-full">
                                    <label class="text-color text-xl block mt-5">Tagline</label>
                                    <input type="text" id="tagline" name="tagline" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('tagline'))
                                        <span class="text-red-500">{{ $errors->first('tagline') }}</span>
                                    @endif
                                </div>
                                <div class="w-full">
                                    <label class="text-color text-xl block mt-5">Full Address</label>
                                    <input type="text" id="full_address" name="full_address" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('full_address'))
                                        <span class="text-red-500">{{ $errors->first('full_address') }}</span>
                                    @endif
                                </div>
                                <div class="w-full">
                                    <label class="text-color text-xl block mt-5">Phone Number</label>
                                    <input type="tel" id="phone_no" name="phone_no" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('phone_no'))
                                        <span class="text-red-500">{{ $errors->first('phone_no') }}</span>
                                    @endif
                                </div>
                                <div class="w-full" data-required-group="stage">
                                    <label class="text-color text-xl block mt-5">Stage</label>
                                    <div class="flex flex-wrap justify-between">
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="stage"
                                                id="idea_stage" value="Idea/Concept stage">
                                            <label class="form-check-label text-black font-medium"
                                                for="idea_stage">Idea/Concept stage</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="stage"
                                                id="startup_stage" value="Startup stage">
                                            <label class="form-check-label text-black font-medium"
                                                for="startup_stage">Startup stage</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="stage"
                                                id="growth_stage" value="Growth stage">
                                            <label class="form-check-label text-black font-medium" for="growth_stage">Growth
                                                stage</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="stage"
                                                id="mature_stage" value="Mature stage">
                                            <label class="form-check-label text-black font-medium" for="mature_stage">Mature
                                                stage</label>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="w-full" data-required-group="customer_base">
                                    <label class="text-color text-xl block">Where are your customers based? </label>
                                    <div class="flex gap-6 flex-wrap">
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customer_base[]"
                                                value="Urban">
                                            <label class="form-check-label text-black font-medium" for="urban">Urban
                                                based customers</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customer_base[]"
                                                value="Rural">
                                            <label class="form-check-label text-black font-medium" for="rural">Rural
                                                based customers</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="w-full">
                                    <label class="text-color text-xl block">Sectors</label>
                                    <select class="form-control text-black bg-white" id="sectors" name="sectors[]"
                                        required multiple>
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->sector_name }}">{{ $sector->sector_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="w-full">
                                    <label class="text-color text-xl block"> Email </label>
                                    <input type="text" id="email" name="email" class="w-full rounded-md mt-1"
                                        required>
                                </div>
                            </div> <br>
                            <div class="w-full ">
                                <div class="w-full">
                                    <label class="text-color text-xl block"> Founding Date</label>
                                    <input type="date" id="founding_date" name="founding_date" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('founding_date'))
                                        <span class="text-red-500">{{ $errors->first('founding_date') }}</span>
                                    @endif
                                </div>
                                <div class="w-full">
                                    <label class="text-color text-xl block mt-5">Pitch</label>
                                    <input type="file" class="w-full rounded-md mt-1" id="pitch" name="pitch"
                                        required>

                                    @if ($errors->has('pitch'))
                                        <span class="text-red-500">{{ $errors->first('pitch') }}</span>
                                    @endif
                                </div>
                                <br>
                                <div class="w-full">
                                    <label class="text-color text-xl block">Pitch Video URL </label>
                                    <input type="url" id="pitch_video_url" name="pitch_video_url" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('pitch_video_url'))
                                        <span class="text-red-500">{{ $errors->first('pitch_video_url') }}</span>
                                    @endif
                                </div>
                                <div class="w-full">
                                    <label class="text-color text-xl block mt-5">Country</label>
                                    {{-- <input type="text" id="country" name="country" required class="w-full rounded-md mt-1"> --}}
                                    <select class="w-full rounded-md mt-1 select2" name="countries[]" required multiple>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('countries'))
                                        <span class="text-red-500">{{ $errors->first('countries') }}</span>
                                    @endif
                                </div>
                                <div class="w-full" data-required-group="customers">
                                    <label class="text-color text-xl block mt-5">What type of customers do you
                                        serve?</label>
                                    <div class="flex flex-wrap gap-6 justify-around">
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="B2B">
                                            <label class="form-check-label text-black font-medium"
                                                for="b2b">B2B</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="B2B2B">
                                            <label class="form-check-label text-black font-medium"
                                                for="b2b2b">B2B2B</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="B2B2C">
                                            <label class="form-check-label text-black font-medium"
                                                for="b2b2c">B2B2C</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="B2C">
                                            <label class="form-check-label text-black font-medium"
                                                for="b2c">B2C</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="C2C">
                                            <label class="form-check-label text-black font-medium"
                                                for="c2c">C2C</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="B2G">
                                            <label class="form-check-label text-black font-medium"
                                                for="b2g">Governments (B2G)</label>
                                        </div>
                                        <div class="flex gap-5 form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="checkbox" name="customers[]"
                                                value="Non-profits">
                                            <label class="form-check-label text-black font-medium"
                                                for="nonprofits">Non-profits</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label class="text-color text-xl block"> Website </label>
                                    <input type="url" id="website" name="website" required
                                        class="w-full rounded-md mt-1">
                                    @if ($errors->has('website'))
                                        <span class="text-red-500 text-sm">{{ $errors->first('website') }}</span>
                                    @endif
                                </div>
                                <br>
                                <div class="w-full">
                                    <label class="text-color text-xl block"> Background Image </label>
                                    <input type="file" id="background_image" name="background_image" accept="image/*"
                                        required class="w-full rounded-md mt-1">
                                </div>
                                @if ($errors->has('background_image'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('background_image') }}</span>
                                @endif
                                <br>
                                <div class="w-full">
                                    <label class="text-color text-xl block"> Logo </label>
                                    <input type="file" id="logo" name="logo" accept="image/*"
                                        class="w-full rounded-md mt-1" required>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5"> Business Description </label>
                            <textarea class="w-full rounded-md mt-1" id="venture_description" name="venture_description" rows="4"
                                required></textarea>
                        </div>
                        @if ($errors->has('venture_description'))
                            <span class="text-red-500 text-sm">{{ $errors->first('venture_description') }}</span>
                        @endif
                        <br>
                        <div class="sm:flex gap-6 justify-between">
                            <div class="w-full space-y-4">
                                <label class="text-color text-xl block">Social Media Links</label>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-instagram text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="instagram" placeholder="Instagram Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-facebook-f text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="facebook" placeholder="Facebook Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-tiktok text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="tiktok" placeholder="TikTok Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>
                            </div>

                            <div class="w-full space-y-6 pt-7">
                                <div class="flex items-center gap-3">
                                    <i class="fab fa-linkedin-in text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="linkedin" placeholder="LinkedIn Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-twitter text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="twitter" placeholder="Twitter Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-youtube text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="youtube" placeholder="YouTube Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Step 2 -->
                    <div class="step hidden" id="step-2">
                        <label class="text-color text-xl block">Team Details</label>
                        <textarea id="team_details" name="team_details" rows="4" required class="w-full rounded-md mt-1"></textarea>

                        <div id="team-members-container">
                            <div class="team-member-group mb-6">
                                <label class="text-color text-xl block">Team Member Name (1)</label>
                                <input type="text" name="membername[]" required class="w-full rounded-md mt-1">

                                <label class="text-color text-xl block mt-4">Member Designation</label>
                                <input type="text" name="designation[]" required class="w-full rounded-md mt-1">

                                <label class="text-color text-xl block mt-4">Member Description</label>
                                <textarea name="description[]" required class="w-full rounded-md mt-1"></textarea>
                            </div>

                            <div class="w-full">
                                <label class="text-color text-xl block"> Email </label>
                                <input type="text" id="email" name="team_email" class="w-full rounded-md mt-1"
                                    required>
                            </div>

                            <div class="w-full space-y-4">
                                <label class="text-color text-xl block">Social Media Links</label>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-instagram text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="team_instagram[]" placeholder="Instagram Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-facebook-f text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="team_facebook[]" placeholder="Facebook Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-tiktok text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="team_tiktok[]" placeholder="TikTok Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>
                            </div>

                            <div class="w-full space-y-6 pt-7">
                                <div class="flex items-center gap-3">
                                    <i class="fab fa-linkedin-in text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="team_linkedin[]" placeholder="LinkedIn Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-twitter text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="team_twitter[]" placeholder="Twitter Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fab fa-youtube text-xl text-gray-600 w-6"></i>
                                    <input type="url" name="team_youtube[]" placeholder="YouTube Link"
                                        class="w-full rounded-md mt-1" required>
                                </div>
                            </div>
                        </div>

                        <!-- Add Member Button -->
                        <button type="button" id="add-member-btn"
                            class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded-md mt-4">
                            + Add Team Member
                        </button>
                        <br>
                    </div>

                    <!-- Step 3 -->
                    <div class="step hidden" id="step-3">
                        <div class="w-full space-y-6">
                            <div class="w-full">
                                <label class="text-color text-xl block">Average Monthly Customers</label>
                                <input type="number" id="avg_customers" name="avg_customer"
                                    class="w-full rounded-md mt-1" required>
                                @if ($errors->has('avg_customers'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('avg_customers') }}</span>
                                @endif
                            </div>

                            <div class="w-full">
                                <label class="text-color text-xl block">Average Monthly Revenue</label>
                                <input type="number" id="avg_revenue" name="avg_revenue" class="w-full rounded-md mt-1"
                                    required step="any">
                                @if ($errors->has('avg_revenue'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('avg_revenue') }}</span>
                                @endif
                            </div>

                            <div class="w-full">
                                <label class="text-color text-xl block">Average Monthly Expenditure</label>
                                <input type="number" id="avg_expenditure" name="avg_expenditure"
                                    class="w-full rounded-md mt-1" required step="any">
                                @if ($errors->has('avg_expenditure'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('avg_expenditure') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step hidden" id="step-4">
                        <div class="sm:flex gap-6 justify-between">
                            <div class="w-full">
                                <label class="text-color text-xl block mb-2">Are you raising funds?</label>

                                <div class="flex gap-6 mb-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="raising_funds" value="yes"
                                            onchange="toggleFundraisingFields()" required>
                                        <span class="ml-2">Yes</span>
                                    </label>

                                    <label class="inline-flex items-center">
                                        <input type="radio" name="raising_funds" value="no"
                                            onchange="toggleFundraisingFields()" required>
                                        <span class="ml-2">No</span>
                                    </label>
                                </div>

                                <div id="fundraising-details" class="hidden space-y-4">
                                    <div>
                                        <label class="text-color text-xl block">Amount</label>
                                        <input type="number" name="amount" class="w-full rounded-md mt-1"
                                            step="any">
                                    </div>

                                    <div>
                                        <label class="text-color text-xl block">Type of Funding Preferred</label>
                                        <select name="type_of_fundings[]" class="w-full rounded-md mt-1 select2" multiple>
                                            <option value="Grant">Grant</option>
                                            <option value="Equity">Equity</option>
                                            <option value="Loan">Loan</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="text-color text-xl block mt-4">Select Your Funding Rounds</label>
                                        <select name="funding_rounds[]" class="w-full rounded-md mt-1 select2" multiple>
                                            <option value="Pre-Seed">Pre-Seed</option>
                                            <option value="Seed">Seed</option>
                                            <option value="Series A">Series A</option>
                                            <option value="Series B">Series B</option>
                                            <option value="Series C">Series C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Step 5 -->
                    <div class="step hidden" id="step-5">
                        <div id="document-fields-container" class="space-y-6">
                            <!-- First Document Set -->
                            <div class="document-set" data-index="0">
                                <h3 class="text-lg font-semibold mb-2">Document 1</h3>
                                <div class="sm:flex gap-6 justify-between flex-wrap">
                                    <!-- Category -->
                                    <div class="w-full sm:w-1/4">
                                        <label class="text-color text-base block mb-1">Document Category</label>
                                        <select name="documents[0][category]"
                                            class="category-select w-full rounded-md mt-1 text-black" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Subcategory -->
                                    <!-- Document Sub Category -->
                                    <div class="w-full sm:w-1/4">
                                        <label class="text-color text-base block mb-1">Document Sub Category</label>
                                        <select name="documents[0][sub_category]"
                                            class="subcategory-select w-full rounded-md mt-1 text-black" required>
                                            <option value="">-- Select Sub Category --</option>
                                        </select>
                                    </div>

                                    <!-- Name -->
                                    <div class="w-full sm:w-1/4">
                                        <label class="text-color text-base block mb-1">Document Name</label>
                                        <input type="text" name="documents[0][name]" class="w-full rounded-md mt-1"
                                            required>
                                    </div>

                                    <!-- File -->
                                    <div class="w-full sm:w-1/4">
                                        <label class="text-color text-base block mb-1">Upload Document</label>
                                        <input type="file" name="documents[0][file]" class="w-full rounded-md mt-1"
                                            accept=".pdf,.doc,.docx,.txt" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add More Button -->
                        <div class="mt-4">
                            <button type="button" id="add-document-button"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                                + Add Another Document
                            </button>
                        </div>
                    </div>


                    <!-- Step 6 -->
                    <div class="step hidden" id="step-6">
                        <div class="w-full">
                            <label class="text-color text-xl block mb-2">Impact Areas (Select all that apply)</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @php
                                    $impactOptions = [
                                        'No Poverty',
                                        'Zero Hunger',
                                        'Good Health and Well-being',
                                        'Quality Education',
                                        'Gender Equality',
                                        'Clean Water and Sanitation',
                                        'Affordable and Clean Energy',
                                        'Decent Work and Economic Growth',
                                        'Industry, Innovation and Infrastructure',
                                        'Reduced Inequalities',
                                        'Sustainable Cities and Communities',
                                        'Responsible Consumption and Production',
                                        'Climate Action',
                                        'Life Below Water',
                                        'Life on Land',
                                        'Peace, Justice, and Strong Institutions',
                                        'Partnerships for the Goals',
                                    ];
                                @endphp

                                @foreach ($impactOptions as $option)
                                    <label class="inline-flex items-center space-x-2">
                                        <input type="checkbox" name="impact[]" value="{{ $option }}"
                                            class="rounded text-blue-600">
                                        <span>{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>

                            @if ($errors->has('impact'))
                                <span class="text-red-500 text-sm">{{ $errors->first('impact') }}</span>
                            @endif
                        </div>
                    </div>


                    <!-- Navigation Buttons -->
                    <div class="flex justify-between  mt-10">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"
                            class="bg-color text-white px-6 py-3 rounded-lg hidden">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)"
                            class="bg-color text-white px-6 py-3 rounded-lg">Next</button>
                        <button type="submit" id="submitBtn"
                            class="bg-color text-white px-6 py-3 rounded-lg hidden">Submit</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- JS -->
        <script>
            let currentStep = 1;
            const totalSteps = 6;

            function showStep(step) {
                document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
                document.getElementById('step-' + step).classList.remove('hidden');

                document.getElementById('prevBtn').classList.toggle('hidden', step === 1);
                document.getElementById('nextBtn').classList.toggle('hidden', step === totalSteps);
                document.getElementById('submitBtn').classList.toggle('hidden', step !== totalSteps);

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
            }

            function nextPrev(n) {
                const currentDiv = document.getElementById('step-' + currentStep);
                const inputs = currentDiv.querySelectorAll('input[required], textarea[required], select[required]');
                let valid = true;

                // ✅ Validate individual required fields
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('border-red-500');
                        valid = false;

                        const label = input.closest('div')?.querySelector('label');
                        const fieldName = label ? label.innerText.trim() : input.name || "This field";
                        toastr.error(`${fieldName} is required.`);
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });
                const pitchInput = currentDiv.querySelector('#pitch[type="file"]');
                if (pitchInput && pitchInput.files.length > 0) {
                    const allowedExtensions = ['pdf', 'ppt', 'pptx'];
                    const fileName = pitchInput.files[0].name;
                    const fileExtension = fileName.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(fileExtension)) {
                        valid = false;
                        pitchInput.classList.add('border-red-500');
                        toastr.error('Pitch must be a PDF or PowerPoint file (.pdf, .ppt, .pptx)');
                    } else {
                        pitchInput.classList.remove('border-red-500');
                    }
                }

                // ✅ Validate custom checkbox/radio groups using data-required-group
                const requiredGroups = currentDiv.querySelectorAll('[data-required-group]');
                requiredGroups.forEach(group => {
                    const inputs = group.querySelectorAll('input[type="checkbox"], input[type="radio"]');
                    const anyChecked = Array.from(inputs).some(input => input.checked);
                    if (!anyChecked) {
                        valid = false;
                        group.classList.add('border-red-500', 'rounded', 'p-2'); // Optional visual cue
                        const label = group.querySelector('label');
                        const labelText = label ? label.innerText.trim() : 'This field';
                        toastr.error(`${labelText} is required.`);
                    } else {
                        group.classList.remove('border-red-500');
                    }
                });

                // 🚫 Do not proceed if any field is invalid
                if (n === 1 && !valid) return;

                currentStep += n;
                currentStep = Math.max(1, Math.min(currentStep, totalSteps));
                showStep(currentStep);
            }

            document.addEventListener("DOMContentLoaded", function() {
                showStep(currentStep);

                const petType = document.getElementById('pet_type');
                const dogBreed = document.getElementById('dog_breed');
                const catBreed = document.getElementById('cat_breed');

                if (petType) {
                    petType.addEventListener('change', function() {
                        if (this.value === 'dog') {
                            dogBreed.style.display = 'block';
                            catBreed.style.display = 'none';
                        } else if (this.value === 'cat') {
                            dogBreed.style.display = 'none';
                            catBreed.style.display = 'block';
                        } else {
                            dogBreed.style.display = 'none';
                            catBreed.style.display = 'none';
                        }
                    });
                }
            });
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select one or more countries",
                    allowClear: true,
                    width: '100%'
                });
            });

            $(document).ready(function() {
                $('#sectors').select2({
                    placeholder: "Select one or more sectors",
                    width: '100%'
                });
            });

            let memberCount = 1;

            document.getElementById('add-member-btn').addEventListener('click', function() {
                const container = document.getElementById('team-members-container');

                const index = container.querySelectorAll('.team-member-group').length + 1;

                const html = `
                    <div class="team-member-group mb-6 border-t pt-6 mt-6">
                        <label class="text-color text-xl block">Team Member Name (${index})</label>
                        <input type="text" name="membername[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">Member Designation</label>
                        <input type="text" name="designation[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">Member Description</label>
                        <textarea name="description[]" required class="w-full rounded-md mt-1"></textarea>

                        <label class="text-color text-xl block mt-4">Email</label>
                        <input type="email" name="team_email[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">Instagram</label>
                        <input type="url" name="team_instagram[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">Facebook</label>
                        <input type="url" name="team_facebook[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">TikTok</label>
                        <input type="url" name="team_tiktok[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">LinkedIn</label>
                        <input type="url" name="team_linkedin[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">Twitter</label>
                        <input type="url" name="team_twitter[]" required class="w-full rounded-md mt-1">

                        <label class="text-color text-xl block mt-4">YouTube</label>
                        <input type="url" name="team_youtube[]" required class="w-full rounded-md mt-1">
                    </div>
                `;

                container.insertAdjacentHTML('beforeend', html);
            });

            function toggleFundraisingFields() {
                const isRaising = document.querySelector('input[name="raising_funds"]:checked').value === 'yes';
                document.getElementById('fundraising-details').classList.toggle('hidden', !isRaising);
            }

            // Document
            let documentIndex = 1; // Since 0 is already rendered

            const categories = @json($categories);
            const subcategories = @json($subcategories);

            const buildCategoryOptions = () => {
                let options = `<option value="">-- Select Category --</option>`;
                categories.forEach(cat => {
                    options += `<option value="${cat.id}">${cat.title}</option>`;
                });
                return options;
            };

            const buildSubCategoryOptions = () => {
                let options = `<option value="">-- Select Sub Category --</option>`;
                subcategories.forEach(sub => {
                    options += `<option value="${sub.id}" data-category="${sub.category_id}">${sub.title}</option>`;
                });
                return options;
            };

            document.getElementById('add-document-button').addEventListener('click', function() {
                const container = document.getElementById('document-fields-container');

                const newSet = document.createElement('div');
                newSet.classList.add('document-set', 'mt-6');
                newSet.dataset.index = documentIndex;

                const categoryOptions = buildCategoryOptions();
                const subCategoryOptions = buildSubCategoryOptions();

                newSet.innerHTML = `
            <h3 class="text-lg font-semibold mb-2">Document ${documentIndex + 1}</h3>
            <div class="sm:flex gap-6 justify-between flex-wrap">
                <!-- Category -->
                <div class="w-full sm:w-1/4">
                    <label class="text-color text-base block mb-1">Document Category</label>
                    <select name="documents[${documentIndex}][category]" 
                            class="category-select w-full rounded-md mt-1 text-black" required>
                        ${categoryOptions}
                    </select>
                </div>

                <!-- Subcategory -->
                <div class="w-full sm:w-1/4">
                    <label class="text-color text-base block mb-1">Document Sub Category</label>
                    <select name="documents[${documentIndex}][sub_category]" 
                            class="subcategory-select w-full rounded-md mt-1 text-black" required>
                        ${subCategoryOptions}
                    </select>
                </div>

                <!-- Name -->
                <div class="w-full sm:w-1/4">
                    <label class="text-color text-base block mb-1">Document Name</label>
                    <input type="text" name="documents[${documentIndex}][name]" 
                           class="w-full rounded-md mt-1" required>
                </div>

                <!-- File -->
                <div class="w-full sm:w-1/4">
                    <label class="text-color text-base block mb-1">Upload Document</label>
                    <input type="file" name="documents[${documentIndex}][file]" 
                           class="w-full rounded-md mt-1" accept=".pdf,.doc,.docx,.txt" required>
                </div>
            </div>
        `;

                container.appendChild(newSet);
                documentIndex++;
            });

            // Filter subcategories based on selected category
            $(document).on('change', '.category-select', function () {
                const categoryId = $(this).val();
                const subcategorySelect = $(this).closest('.document-set').find('.subcategory-select');

                if (!categoryId) {
                    subcategorySelect.html('<option value="">-- Select Sub Category --</option>');
                    return;
                }

                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: 'GET',
                    success: function (data) {
                        let options = '<option value="">-- Select Sub Category --</option>';
                        data.forEach(function (subcategory) {
                            options += `<option value="${subcategory.id}">${subcategory.title}</option>`;
                        });
                        subcategorySelect.html(options);
                    },
                    error: function () {
                        subcategorySelect.html('<option value="">Error loading subcategories</option>');
                    }
                });
            });
        </script>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>