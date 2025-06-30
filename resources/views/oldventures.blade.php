@extends('theme::layouts.app')
@section('content')
<div class="container">

    <h2 class="text-color text-xl font-semibold">Add Your Venture</h2>
    <!-- Add Your Venture Box -->
    <div class="alert alert-info bg-white p-4 mb-4 mt-2">
        <p class="textcolor">With a venture profile you can:</p>
        <ul>
            <li class="textcolor">Build a following and promote your venture to a global network</li>
            <li class="textcolor">Connect to fellow founders, mentors, and investors</li>
            <li class="textcolor">Be found by support program organizers</li>
            <li class="textcolor">Apply to select program opportunities for support</li>
            <li class="textcolor">Apply for mentorship</li>
            <li class="textcolor">Start free courses on the Startup Academy</li>
            <li class="textcolor">Document your progress and launch a fundraising campaign</li>
        </ul>
        <p class="textcolor">Creating a venture profile is simple and only takes 5 minutes. Provide basic information about your company
            and enrich the profile with additional information after publishing the page. Take a moment to review our
            guidelines to be sure your venture is a good fit.</p>
    </div>

    <!-- Venture Details Form -->
    <form action="{{ route('submit.venture') }}" method="POST" enctype="multipart/form-data"> @csrf
        <h4 class="font-bold text-color text-xl mb-3">Venture Details</h4>
        <div class="flex flex-wrap justify-center">
            <!-- Company Name -->
            <div class="form-group mx-auto">
                <label class="text-white" for="company_name">Company Name</label>
                <input style="width: 230px;" type="text" class="form-control " id="company_name" name="company_name" required>
                @if ($errors->has('company_name'))
                    <span class="text-red-500">{{ $errors->first('company_name') }}</span>
                @endif
            </div>


            <!-- Tagline -->
            <div class="form-group mx-auto">
                <label class="text-white" for="tagline">Tagline</label>
                <input style="width: 230px;" type="text" class="form-control" id="tagline" name="tagline" required>
                @if ($errors->has('tagline'))
    <span class="text-red-500">{{ $errors->first('tagline') }}</span>
    @endif
            </div>

            <!-- Founding Date -->
            <div class="form-group mx-auto">
                <label class="text-white" for="founding_date">Founding Date</label>
                <input style="width: 230px;" type="date" class="form-control" id="founding_date" name="founding_date" required>
                @if ($errors->has('founding_date'))
    <span class="text-red-500">{{ $errors->first('founding_date') }}</span>
    @endif
            </div>

            <!-- Pitch -->
            <div class="form-group mx-auto">
                <label class="text-white" for="pitch">Pitch</label>
                <textarea style="width: 230px; height:46.5px;" class="form-control" id="pitch" name="pitch" rows="0" required></textarea>
                @if ($errors->has('pitch'))
    <span class="text-red-500">{{ $errors->first('pitch') }}</span>
    @endif
            </div>

            <!-- Pitch Video URL -->
            <div class="form-group mx-auto">
                <label class="text-white" for="pitch_video_url">Pitch Video URL</label>
                <input style="width: 230px;" type="url" class="form-control" id="pitch_video_url" name="pitch_video_url" required>
                @if ($errors->has('pitch_video_url'))
    <span class="text-red-500">{{ $errors->first('pitch_video_url') }}</span>
    @endif
            </div>

            <!-- Full Address -->
            <div class="form-group mx-auto">
                <label class="text-white" for="full_address">Full Address</label>
                <input style="width: 230px;" type="text" class="form-control" id="full_address" name="full_address" required>
                @if ($errors->has('full_address'))
    <span class="text-red-500">{{ $errors->first('full_address') }}</span>
    @endif
            </div>

            <!-- Phone Number (Optional) -->
            <div class="form-group mx-auto">
                <label class="text-white" for="phone_no">Phone Number (Optional)</label>
                <input style="width: 230px;" type="tel" class="form-control" id="phone_no" name="phone_no">
                @if ($errors->has('phone_no'))
    <span class="text-red-500">{{ $errors->first('phone_no') }}</span>
    @endif
            </div>

            <div class="form-group mx-auto">

            <label class="text-green-500 font-semibold">Country:</label>
                <select class="w-full rounded-md border border-green-500" name="countries[]" required multiple>
                <option value="" disabled selected>Select a country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                @endforeach
                </select>
                @if ($errors->has('countries'))
        <span class="text-red-500">{{ $errors->first('countries') }}</span>
    @endif
                @if ($errors->has('countries.*'))
        <span class="text-red-500">{{ $errors->first('countries.*') }}</span>
    @endif
                <br><br>
            </div>
        </div>

        <!-- Stage -->
        <div class="form-group">
            <label class="font-bold text-color text-xl">Stage</label><br>
            <div class="flex flex-wrap justify-between">
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="radio" name="stage" id="idea_stage" value="Idea/Concept stage"
                        required>
                    <label class="form-check-label text-white font-medium" for="idea_stage">Idea/Concept stage</label>
                </div>
                <div class="flex gap-5  form-check form-check-inline">
                    <input class="form-check-input mt-1" type="radio" name="stage" id="startup_stage" value="Startup stage">
                    <label class="form-check-label text-white font-medium" for="startup_stage">Startup stage</label>
                </div>
                <div class="flex gap-5  form-check form-check-inline">
                    <input class="form-check-input mt-1" type="radio" name="stage" id="growth_stage" value="Growth stage">
                    <label class="form-check-label text-white font-medium" for="growth_stage">Growth stage</label>
                </div>
                <div class="flex gap-5  form-check form-check-inline">
                    <input class="form-check-input mt-1" type="radio" name="stage" id="mature_stage" value="Mature stage">
                    <label class="form-check-label text-white font-medium" for="mature_stage">Mature stage</label>
                </div>
            </div>
            @if ($errors->has('stage'))
        <span class="text-red-500">{{ $errors->first('stage') }}</span>
    @endif
        </div>

        <!-- Customer Type -->
        <div class="form-group">
            <label class="font-bold text-color text-xl">What type of customers do you serve?</label><br>
            <div class="flex flex-wrap gap-6 justify-around">
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2B">
                    <label class="form-check-label text-white font-medium" for="b2b">B2B</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2B2B">
                    <label class="form-check-label text-white font-medium" for="b2b2b">B2B2B</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2B2C">
                    <label class="form-check-label text-white font-medium" for="b2b2c">B2B2C</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2C">
                    <label class="form-check-label text-white font-medium" for="b2c">B2C</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="C2C">
                    <label class="form-check-label text-white font-medium" for="c2c">C2C</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2G">
                    <label class="form-check-label text-white font-medium" for="b2g">Governments (B2G)</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="Non-profits">
                    <label class="form-check-label text-white font-medium" for="nonprofits">Non-profits</label>
                </div>
            </div>
            @if ($errors->has('customers'))
        <span class="text-red-500">{{ $errors->first('customers') }}</span>
    @endif
        </div>

        <!-- Customer Base -->
        <div class="form-group">
            <label class="font-bold text-color text-xl">Where are your customers based?</label><br>
            <div class="flex gap-6 flex-wrap">
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customer_base[]" value="Urban">
                    <label class="form-check-label text-white font-medium" for="urban">Urban based customers</label>
                </div>
                <div class="flex gap-5 form-check form-check-inline">
                    <input class="form-check-input mt-1" type="checkbox" name="customer_base[]" value="Rural">
                    <label class="form-check-label text-white font-medium" for="rural">Rural based customers</label>
                </div>
            </div>
            @if ($errors->has('customer_base'))
        <span class="text-red-500">{{ $errors->first('customer_base') }}</span>
    @endif
        </div>

        <!-- Sectors -->
        <div class="form-group">
            <label for="sectors" class="font-bold text-color text-xl">Sectors</label>
            <select class="form-control" id="sectors" name="sectors[]">
                <option class="text-md font-medium" value="Tech">Technology</option>
                <option class="text-md font-medium" value="Health">Healthcare</option>
                <option class="text-md font-medium" value="Finance">Finance</option>
                <option class="text-md font-medium" value="Education">Education</option>
            </select>
            @if ($errors->has('sectors'))
        <span class="text-red-500 text-sm">{{ $errors->first('sectors') }}</span>
    @endif
        </div>

        <!-- Sectors -->
        <div class="form-group">
            <label for="sectors" class="font-bold text-color text-xl">Sectors</label>
            <select class="form-control" id="sectors" name="sectors[]" required multiple>
            @foreach ($sectors as $sector)
                <option class="text-md font-medium" value="{{ $sector->sector_name }}">
                    {{ $sector->sector_name }}
                </option>
            @endforeach
            </select>
        </div>
        @if ($errors->has('sectors'))
            <span class="text-red-500 text-sm">{{ $errors->first('sectors') }}</span>
        @endif

        <!-- Online Presence -->
        <h4 class="font-weight-bold mb-3 text-white">Online Presence</h4>

        <!-- Website -->
        <div class="form-group">
            <label for="website" class="font-bold text-color text-xl">Website</label>
            <input type="url" class="form-control" id="website" name="website">
            @if ($errors->has('website'))
        <span class="text-red-500 text-sm">{{ $errors->first('website') }}</span>
    @endif
        </div>

        <!-- logo -->
        <div class="form-group">
            <label for="logo" class="font-bold text-color text-xl">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
            @if ($errors->has('logo'))
        <span class="text-red-500 text-sm">{{ $errors->first('logo') }}</span>
    @endif
        </div>

        <!-- background image -->
        <div class="form-group">
            <label for="background_image" class="font-bold text-color text-xl">Background Image</label>
            <input type="file" class="form-control" id="background_image" name="background_image" accept="image/*">
            @if ($errors->has('background_image'))
        <span class="text-red-500 text-sm">{{ $errors->first('background_image') }}</span>
    @endif   
        </div>
        <!-- Venture Description -->
        <div class="form-group">
            <label for="venture_description" class="font-bold text-color text-xl">Venture Description</label>
            <textarea class="form-control" id="venture_description" name="venture_description" rows="4" required></textarea>
            @if ($errors->has('venture_description'))
        <span class="text-red-500 text-sm">{{ $errors->first('venture_description') }}</span>
    @endif
        </div>
        <!-- team details -->
        <div class="form-group">
            <label for="team_details" class="font-bold text-color text-xl">Team Details</label>
            <textarea class="form-control" id="team_details" name="team_details" rows="4" required></textarea>
            @if ($errors->has('team_details'))
        <span class="text-red-500 text-sm">{{ $errors->first('team_details') }}</span>
    @endif
        </div>
        <!-- traction -->
        <div class="form-group">
            <label for="traction" class="font-bold text-color text-xl">Traction</label>
            <textarea class="form-control" id="traction" name="traction" rows="4" required></textarea>
            @if ($errors->has('traction'))
        <span class="text-red-500 text-sm">{{ $errors->first('traction') }}</span>
    @endif
        </div>
        <!-- fundraising -->
        <div class="form-group">
            <label for="fundraising" class="font-bold text-color text-xl">Fundraising</label>
            <textarea class="form-control" id="fundraising" name="fundraising" rows="4" required></textarea>
            @if ($errors->has('fundraising'))
        <span class="text-red-500 text-sm">{{ $errors->first('fundraising') }}</span>
    @endif
        </div>
        <!-- documents -->
        <div class="form-group">
            <label for="documents" class="font-bold text-color text-xl">Documents</label>
            <input type="file" class="form-control" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.txt">
            <small class="form-text text-muted">Upload any relevant documents (e.g., business plan, pitch deck)</small>
            @if ($errors->has('documents'))
        <span class="text-red-500 text-sm">{{ $errors->first('documents') }}</span>
    @endif
        </div>
        <!-- impact -->
        <div class="form-group">
            <label for="impact" class="font-bold text-color text-xl">Impact</label>
            <textarea class="form-control" id="impact" name="impact" rows="4" required></textarea>
            @if ($errors->has('impact'))
        <span class="text-red-500 text-sm">{{ $errors->first('impact') }}</span>
    @endif
        </div>     
        <!-- Social Media Links -->
        <div class="form-group">
            <label class="font-bold text-color text-xl">Social Media</label><br>
            <div class="flex flex-wrap justify-center gap-6">
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                    <input type="url" class="form-control" name="instagram" placeholder="Instagram Link">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                    <input type="url" class="form-control" name="facebook" placeholder="Facebook Link">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                    <input type="url" class="form-control" name="linkedin" placeholder="LinkedIn Link">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                    <input type="url" class="form-control" name="twitter" placeholder="Twitter Link">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                    <input type="url" class="form-control" name="youtube" placeholder="YouTube Link">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                    <input type="url" class="form-control" name="tiktok" placeholder="TikTok Link">
                </div>
            </div>
            @if ($errors->has('social_media'))
        <span class="text-red-500 text-sm">{{ $errors->first('social_media') }}</span>
    @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block mt-4 w-48">Publish and View Venture Profile</button>
    </form>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Toastr config + trigger -->
<script>
    $(document).ready(function() {
        // Toastr global options (optional, makes it look better)
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "4000",
            "positionClass": "toast-top-right"
        };

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    });
</script>

<style>
    body {
        background: #f0f2f5;
    }

    .container {
        max-width: 900px;
        margin: 30px auto;
        padding: 40px;
        background: #24b3bd;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .textcolor {
        color: #003853;
    }

    .alert-info {
        border-left: 5px solid #003853;
        padding: 25px;
        border-radius: 6px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    .form-control {
        border: 1px solid #ccc;
        padding: 12px;
        border-radius: 6px;
        font-size: 14px;
        transition: border 0.3s ease;
        width: 100%;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, .2);
        width: 100%;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-check {
        margin-right: 15px;
    }

    .form-check-label {
        font-weight: 400;
    }

    select[multiple] {
        min-height: 120px;
        background-color: #fff;
        cursor: pointer;
    }

    option {
        padding: 6px;
    }

    .btn-primary {
        background-color: #003853;
        color: #ffffff;
        border: none;
        padding: 12px;
        font-weight: 600;
        font-size: 16px;
        border-radius: 6px;
        margin-top: 25px;
        width: 100%;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background-color: #ffffff;
        color: #000000;
    }

    .input-group-text {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }

    .input-group .form-control {
        border-left: none;
    }
</style>





@endsection