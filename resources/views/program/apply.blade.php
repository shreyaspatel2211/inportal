@extends('theme::layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<div class="max-w-4xl px-5 mx-auto mt-10 lg:px-0">
    <div class="ml-auto mt-6">
        <p class="text-xl text-[#008b79]">Apply to Program</p>
        <h3 class="text-2xl font-semibold text-green-500 mt-2">
            You're applying for: {{ $program->program_name }}
        </h3>
    </div>

    <h2 class="mt-10 font-bold text-2xl rounded-md py-1 text-center text-white bg-color">
        Program Registration Form
    </h2>

    <form class="mt-10 bg-white rounded-b-lg px-10 py-10 shadow-xl" method="POST" action="{{ route('programs.apply.submit', $program->id) }}"enctype="multipart/form-data" >
    @csrf

    <div class="flex flex-wrap gap-6">
        @foreach($customFields as $key => $field)
            <div class="w-full md:w-[48%] mb-5">
                <label class="text-green-500 font-semibold block mb-1">
                    {{ $field['field_name'] }}
                </label>

                @php
                    $isRequired = $field['required'] === 'yes' ? 'required' : '';
                    $type = strtolower($field['field_type']);
                @endphp

                @if($type === 'text')
                    <input type="text" name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" {{ $isRequired }}>
                @elseif($type === 'text_area')
                    <textarea name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" rows="4" {{ $isRequired }}></textarea>
                @elseif($type === 'email')
                    <input type="email" name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" {{ $isRequired }}>
                @elseif($type === 'phone_number')
                    <input type="text" name="{{ $key }}" class="w-full  rounded-md border border-green-500 px-3 py-2" {{ $isRequired }}>
                @elseif($type === 'link')
                    <input type="url" name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" {{ $isRequired }}>
                @elseif($type === 'file')
                    <input type="file" name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" {{ $isRequired }}>
                @elseif($type === 'check_box' && isset($field['options']))
                    @php
                    $options = is_array($field['options']) ? $field['options'] : explode(',', $field['options']);
                @endphp

                @foreach($options as $option)
                    <label class="inline-flex items-center mr-4">
                        <input type="checkbox" name="{{ $key }}[]" value="{{ trim($option) }}" class="mr-2">
                        {{ trim($option) }}
                    </label>
                @endforeach

                @elseif($type === 'radio_button' && isset($field['options']))
                @php
                    $options = is_array($field['options']) ? $field['options'] : explode(',', $field['options']);
                @endphp
                @foreach($options as $option)
                    <label class="inline-flex items-center mr-4">
                        <input type="radio" name="{{ $key }}" value="{{ trim($option) }}" class="mr-2">
                        {{ trim($option) }}
                    </label>
                @endforeach

                @elseif($type === 'image')
                    <input type="file" accept="image/*" name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" {{ $isRequired }}>
                @else
                    <input type="text" name="{{ $key }}" class="w-full rounded-md border border-green-500 px-3 py-2" placeholder="Unsupported type '{{ $field['field_type'] }}'" {{ $isRequired }}>
                @endif
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary bg-red-500 text-white font-semibold px-6 py-2 w-full mt-10 mx-auto flex justify-center rounded transition duration-300">
        Submit Application
    </button>
</form>

</div>

<style>
    .btn-primary:hover {
        background-color: #24b3bd;
        color: #ffffff;
    }
</style>

@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

@endsection

