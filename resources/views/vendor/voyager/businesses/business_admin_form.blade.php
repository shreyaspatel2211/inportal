{{-- @extends('theme::layouts.app') --}}

 {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('content') --}}

@extends('voyager::master')
<link rel="stylesheet" href="{{ asset('themes/tailwind/css/app.css') }}">

{{-- @section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop --}}

{{-- @section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular')) --}}

{{-- @section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop --}}
@section('content')

<div class="page bg-">

    <!-- Form Section -->
    <div class="w-full px-4 py-12 pt-10 mt-8">
        <div class="max-w-6xl mx-auto py-10 px-2 rounded-lg">
            <h2 class="text-2xl py-3 rounded-md font-bold text-white bg-color text-center mb-8">Add Your Venture</h2>

            <!-- Step Indicators -->
            <div id="stepIndicator" class="sm:flex justify-between bg-color py-3 rounded-md mb-10 text-white font-medium">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="step-indicator step-{{ $i }} text-center flex-1 relative">
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
        <form id="wizardForm" action="{{ route('admin.submit.venture') }}" method="POST" enctype="multipart/form-data"> 
            @csrf

            <!-- Step 1 -->
            <div class="step" id="step-1">
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Company Name </label>
                            <input type="text" id="company_name" name="company_name" required class="w-full rounded-md mt-1">
                            @if ($errors->has('company_name'))
                            <span class="text-red-500">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Tagline</label>
                            <input type="text" id="tagline" name="tagline" required class="w-full rounded-md mt-1">
                            @if ($errors->has('tagline'))
                            <span class="text-red-500">{{ $errors->first('tagline') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Full Address</label>
                            <input type="text" id="full_address" name="full_address" required class="w-full rounded-md mt-1">
                            @if ($errors->has('full_address'))
                            <span class="text-red-500">{{ $errors->first('full_address') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Phone Number</label>
                            <input type="tel" id="phone_no" name="phone_no" required class="w-full rounded-md mt-1">
                            @if ($errors->has('phone_no'))
                            <span class="text-red-500">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Stage</label>
                            <div class="flex flex-wrap justify-between">
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="radio" name="stage" id="idea_stage" value="Idea/Concept stage"
                                        required>
                                    <label class="form-check-label text-black font-medium" for="idea_stage">Idea/Concept stage</label>
                                </div>
                                <div class="flex gap-5  form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="radio" name="stage" id="startup_stage" value="Startup stage">
                                    <label class="form-check-label text-black font-medium" for="startup_stage">Startup stage</label>
                                </div>
                                <div class="flex gap-5  form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="radio" name="stage" id="growth_stage" value="Growth stage">
                                    <label class="form-check-label text-black font-medium" for="growth_stage">Growth stage</label>
                                </div>
                                <div class="flex gap-5  form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="radio" name="stage" id="mature_stage" value="Mature stage">
                                    <label class="form-check-label text-black font-medium" for="mature_stage">Mature stage</label>
                                </div>
                            </div>
                            @if ($errors->has('stage'))
                            <span class="text-red-500">{{ $errors->first('stage') }}</span>
                            @endif
                        </div>
                        <br>
                        <div class="w-full">
                            <label class="text-color text-xl block">Where are your customers based? </label>
                            <div class="flex gap-6 flex-wrap">
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customer_base[]" value="Urban">
                                    <label class="form-check-label text-black font-medium" for="urban">Urban based customers</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customer_base[]" value="Rural">
                                    <label class="form-check-label text-black font-medium" for="rural">Rural based customers</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="w-full">
                            <label class="text-color text-xl block">Sectors </label>
                            <select class="form-control" id="sectors" name="sectors[]">
                                <option class="text-md font-medium" value="Tech">Technology</option>
                                <option class="text-md font-medium" value="Health">Healthcare</option>
                                <option class="text-md font-medium" value="Finance">Finance</option>
                                <option class="text-md font-medium" value="Education">Education</option>
                            </select>
                        </div>
                        <br>
                        <div class="w-full">
                            <label class="text-color text-xl block"> Logo </label>
                            <input type="file" id="logo" name="logo" accept="image/*" class="w-full rounded-md mt-1">
                        </div>
                        <br>
                        <div class="w-full">
                            <label class="text-color text-xl block"> Email </label>
                            <input type="text" id="email" name="email" class="w-full rounded-md mt-1">
                        </div>
                    </div> <br>
                    <div class="w-full ">
                        <div class="w-full">
                            <label class="text-color text-xl block"> Founding Date</label>
                            <input type="date"  id="founding_date" name="founding_date" required class="w-full rounded-md mt-1">
                            @if ($errors->has('founding_date'))
                            <span class="text-red-500">{{ $errors->first('founding_date') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5"> Pitch</label>
                            <textarea class="w-full rounded-md mt-1" id="pitch" name="pitch" rows="0" required></textarea>
                            @if ($errors->has('pitch'))
                            <span class="text-red-500">{{ $errors->first('pitch') }}</span>
                            @endif
                        </div>
                        <br>
                        <div class="w-full">
                            <label class="text-color text-xl block">Pitch Video URL </label>
                            <input type="url" id="pitch_video_url" name="pitch_video_url" required class="w-full rounded-md mt-1">
                            @if ($errors->has('pitch_video_url'))
                            <span class="text-red-500">{{ $errors->first('pitch_video_url') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Country</label>
                            <input type="text" id="full_address" name="full_address" required class="w-full rounded-md mt-1">
                            <select class="w-full rounded-md mt-1" name="countries[]" required multiple>
                                <option value="" disabled selected>Select a country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('countries'))
                                <span class="text-red-500">{{ $errors->first('countries') }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">What type of customers do you serve?</label>
                            <div class="flex flex-wrap gap-6 justify-around">
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2B">
                                    <label class="form-check-label text-black font-medium" for="b2b">B2B</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2B2B">
                                    <label class="form-check-label text-black font-medium" for="b2b2b">B2B2B</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2B2C">
                                    <label class="form-check-label text-black font-medium" for="b2b2c">B2B2C</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2C">
                                    <label class="form-check-label text-black font-medium" for="b2c">B2C</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="C2C">
                                    <label class="form-check-label text-black font-medium" for="c2c">C2C</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="B2G">
                                    <label class="form-check-label text-black font-medium" for="b2g">Governments (B2G)</label>
                                </div>
                                <div class="flex gap-5 form-check form-check-inline">
                                    <input class="form-check-input mt-1" type="checkbox" name="customers[]" value="Non-profits">
                                    <label class="form-check-label text-black font-medium" for="nonprofits">Non-profits</label>
                                </div>
                            </div>
                            @if ($errors->has('customers'))
                            <span class="text-red-500">{{ $errors->first('customers') }}</span>
                            @endif
                            <br>
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block"> Website </label>
                            <input type="url" id="website" name="website" required class="w-full rounded-md mt-1">
                            @if ($errors->has('website'))
                            <span class="text-red-500 text-sm">{{ $errors->first('website') }}</span>
                            @endif
                        </div>
                        <br>
                        <div class="w-full">
                            <label class="text-color text-xl block"> Background Image </label>
                            <input type="file" id="background_image" name="background_image" accept="image/*" required class="w-full rounded-md mt-1">
                        </div>
                        @if ($errors->has('background_image'))
                        <span class="text-red-500 text-sm">{{ $errors->first('background_image') }}</span>
                        @endif
                    </div>
                </div>
                <div class="w-full">
                    <label class="text-color text-xl block mt-5"> Venture Description </label>
                    <textarea class="w-full rounded-md mt-1" id="venture_description" name="venture_description" rows="4" required></textarea>
                </div>
                @if ($errors->has('venture_description'))
                <span class="text-red-500 text-sm">{{ $errors->first('venture_description') }}</span>
                @endif
                    <div class="sm:flex gap-6 justify-between">
                        <div class="w-full">
                            <div class="w-full">
                                <label class="text-color text-xl block">Social Media Links</label>
                                <input type="url" name="instagram" placeholder="Instagram Link" class="w-full rounded-md mt-1">
                            </div>
                            <div class="w-full">
                                <input type="url" name="facebook" placeholder="Facebook Link" class="w-full rounded-md mt-1">
                            </div>
                            <div class="w-full">
                                <input type="url" name="tiktok" placeholder="TikTok Link" class="w-full rounded-md mt-1">
                            </div>
                        </div> <br>
                        <div class="w-full ">
                        <br>
                            <div class="w-full">
                                <input type="url" name="linkedin" placeholder="LinkedIn Link" class="w-full rounded-md mt-1">
                            </div>
                            <div class="w-full">
                                <input type="url" name="twitter" placeholder="Twitter Link" class="w-full rounded-md mt-1">
                            </div>
                            <div class="w-full">
                                <input type="url" name="youtube" placeholder="YouTube Link" class="w-full rounded-md mt-1">
                            </div>
                        </div>
                    </div>
            </div>


            <!-- Step 2 -->
            <div class="step hidden" id="step-2">
                <label class="text-color text-xl block">Team Details</label>
                <textarea id="team_details" name="team_details" rows="4" required class="w-full rounded-md mt-1"></textarea>
                    
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Team Member Name(1)</label>
                            <input type="text" name="membername[]" required class="w-full rounded-md mt-1">
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Member Designation</label>
                            <input type="text" name="designation[]" required class="w-full rounded-md mt-1">
                        </div>
                    </div> <br>
                    <div class="w-full ">
                        <div class="w-full">
                            <label class="text-color text-xl block">Member Description</label>
                            <textarea name="description[]" required class="w-full rounded-md mt-1"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Team Member Name(2)</label>
                            <input type="text" name="membername[]" required class="w-full rounded-md mt-1">
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Member Designation</label>
                            <input type="text" name="designation[]" required class="w-full rounded-md mt-1">
                        </div>
                    </div> <br>
                    <div class="w-full ">
                        <div class="w-full">
                            <label class="text-color text-xl block">Member Description</label>
                            <textarea name="description[]" required class="w-full rounded-md mt-1"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Team Member Name(3)</label>
                            <input type="text" name="membername[]" required class="w-full rounded-md mt-1">
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Member Designation</label>
                            <input type="text" name="designation[]" required class="w-full rounded-md mt-1">
                        </div>
                    </div> <br>
                    <div class="w-full ">
                        <div class="w-full">
                            <label class="text-color text-xl block">Member Description</label>
                            <textarea name="description[]" required class="w-full rounded-md mt-1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Team Member Name(4)</label>
                            <input type="text" name="membername[]" required class="w-full rounded-md mt-1">
                        </div>
                        <div class="w-full">
                            <label class="text-color text-xl block mt-5">Member Designation</label>
                            <input type="text" name="designation[]" required class="w-full rounded-md mt-1">
                        </div>
                    </div> <br>
                    <div class="w-full ">
                        <div class="w-full">
                            <label class="text-color text-xl block">Member Description</label>
                            <textarea name="description[]" required class="w-full rounded-md mt-1"></textarea>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <!-- Step 3 -->
            <div class="step hidden" id="step-3">
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Description</label>
                            <textarea id="traction" name="traction" rows="4" required class="w-full rounded-md mt-1"></textarea>
                            @if ($errors->has('traction'))
                            <span class="text-red-500 text-sm">{{ $errors->first('traction') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="step hidden" id="step-4">
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Previous Fundraise</label>
                            <textarea id="fundraising" name="fundraising" rows="4" required class="w-full rounded-md mt-1"></textarea>
                            @if ($errors->has('fundraising'))
                                <span class="text-red-500 text-sm">{{ $errors->first('fundraising') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- Step 5 -->
            <div class="step hidden" id="step-5">
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Documents</label>
                            <input type="file" class="w-full rounded-md mt-1" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.txt" required>
                            <small class="form-text text-muted">Upload any relevant documents (e.g., business plan, pitch deck)</small>
                            @if ($errors->has('documents'))
                                <span class="text-red-500 text-sm">{{ $errors->first('documents') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- Step 6 -->
            <div class="step hidden" id="step-6">
                <div class="sm:flex gap-6 justify-between">
                    <div class="w-full">
                        <div class="w-full">
                            <label class="text-color text-xl block">Impact</label>
                            <textarea id="impact" name="impact" rows="4" required class="w-full rounded-md mt-1"></textarea>
                            @if ($errors->has('impact'))
                                <span class="text-red-500 text-sm">{{ $errors->first('impact') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- Navigation Buttons -->
            <div class="flex justify-between  mt-10">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="bg-color text-white px-6 py-3 rounded-lg hidden">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="bg-color text-white px-6 py-3 rounded-lg">Next</button>
                <button type="submit" id="submitBtn" class="bg-color text-white px-6 py-3 rounded-lg hidden">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

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
        const inputs = currentDiv.querySelectorAll('input[required]');
        let valid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                valid = false;
            } else {
                input.classList.remove('border-red-500');
            }
        });

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

        petType.addEventListener('change', function() {
            if (this.value === 'dog') {
                dogBreed.style.display = 'block';
                catBreed.style.display = 'none';
            } else if (this.value === 'cat') {
                dogBreed.style.display = 'none';
                catBreed.style.display = 'block';
            }
        });
    });
</script>



@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

        let fieldCount = 1;

        $('.add-row').on('click', function () {
            const newRow = `
                <div class="row custom-field-row mb-2">
                    <div class="form-group col-md-4">
                        <select class="form-control field-type-select" name="field_type[]">
                            <option value="text">Text</option>
                            <option value="email">Email</option>
                            <option value="phone_number">Phone Number</option>
                            <option value="text_area">Text Area</option>
                            <option value="link">Link</option>
                            <option value="image">Image</option>
                            <option value="file">File</option>
                            <option value="check_box">Check Box</option>
                            <option value="radio_button">Radio Button</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="field_name[]" placeholder="Field Name" />
                    </div>
                    <div class="form-group col-md-2">
                        <select name="required[]" class="form-control">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control field-options-input" name="field_options[]" placeholder="Options (comma separated)" style="display: none;" />
                    </div>
                </div>`;
            $('#custom-fields-container').append(newRow);
        });

        // ✅ Show/hide options input when field_type is check_box or radio_button
        $(document).on('change', '.field-type-select', function () {
            const selectedType = $(this).val();
            const $optionsInput = $(this).closest('.custom-field-row').find('.field-options-input');

            if (selectedType === 'check_box' || selectedType === 'radio_button') {
                $optionsInput.show();
            } else {
                $optionsInput.hide().val('');
            }
        });

        // ✅ Trigger change on page load in case of edit
        $(document).ready(function () {
            $('.field-type-select').trigger('change');
        });

    </script>
@stop
