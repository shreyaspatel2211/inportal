@extends('theme::layouts.app')

@section('content')

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<div class="max-w-4xl px-5 mx-auto mt-10 lg:px-0">

    <div class="ml-auto mt-6">
        <p class="text-xl text-[#008b79]">Lorem ipsum dolor sit </p>
        <h3 class="text-2xl font-semibold text-green-500 mt-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Reiciendis provident fuga nam, magnam adipisci neque inventore.
        </h3>
    </div>

    <h2 class="mt-10 font-bold text-2xl rounded-md py-1 text-center text-white bg-color ">Register form</h2>

    <!-- <form method="POST" action=""> -->
    <form class="mt-10 bg-white rounded-b-lg px-10 py-10 shadow-xl" method="POST" action="{{ route('user.register') }}">
        @csrf

        <div class="sm:flex gap-6 md:flex-wrap justify-between w-full">
            <div class="">
                <label class="text-green-500 font-semibold">First name:</label>
                <input class="mt-1 w-full rounded-md border border-green-500" type="text" name="first_name" required><br><br>

                <label class="text-green-500 font-semibold">Last name:</label>
                <input class="mt-1 w-full rounded-md border border-green-500" type="text" name="last_name" required><br><br>

                <label class="text-green-500 font-semibold">Email:</label>
                <input class="mt-1 w-full rounded-md border border-green-500" type="text" name="email" required><br><br>

            </div>
            <br>
            <div class="">
                <label class="text-green-500 font-semibold">Phone number:</label>
                <input class="mt-1 w-full rounded-md border border-green-500" type="text" name="phone" required><br><br>

                <label class="text-green-500 font-semibold">Country:</label>
                <select class="mt-1 w-full rounded-md border border-green-500" name="country" required>
                <option value="" disabled selected>Select a country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                @endforeach
                </select>
                <br><br>
                {{-- <label class="text-green-500 font-semibold">Password:</label>
                <input class="mt-1 w-full rounded-md border border-green-500" type="password" name="password" required><br><br>

                <label class="text-green-500 font-semibold">Confirm password:</label>
                <input class="mt-1 w-full rounded-md border border-green-500" type="password" name="password_confirmation" required><br><br> --}}

                <label class="text-green-500 font-semibold">Region:</label>
                <select class="mt-1 w-full rounded-md border border-green-500" name="region" required>
                    <option value="Ahafo">Ahafo</option>
                    <option value="Ashanti">Ashanti</option>
                    <option value="Bono">Bono</option>
                </select><br><br>
            </div>
        </div>

        <label class="text-green-500 font-semibold">Select one of the following:</label><br>
        <select class="mt-1 w-full rounded-md border border-green-500" name="user_type" required>
            <option value="Entrepreneur">Entrepreneur</option>
            <option value="Investor">Investor</option>
            <option value="Business">Business</option>
            <option value="Partner/NGO">Partner/NGO</option>
        </select>

        <button type="submit" class="btn btn-primary bg-red-500 text-white font-semibold px-6 py-2 w-full  mt-10 mx-auto flex justify-center rounded transition duration-300">Submit</button>
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



@endsection