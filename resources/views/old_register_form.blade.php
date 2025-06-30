@extends('theme::layouts.app')

@section('content')

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<div class="max-w-4xl px-5 mx-auto mt-10 lg:px-0">

    <div class="flex flex-wrap">
        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR6EwxUDmsEjQ3njsm4NPDll2VytvnexedJ34fqoC5TuSoFmNvJ" alt="ima" />
        <div class="ml-auto mt-6">
            <p class="text-xl text-[#008b79]">Lorem ipsum dolor sit </p>
            <h3 class="text-3xl font-semibold text-green-500 mt-2">
                Lorem, ipsum do <br> amet consectetur a <br>elit. Corporis molestia <br> officia sit consectetur adi
            </h3>
        </div>
    </div>

    <h2 class="font-bold text-3xl py-10 pb-12 text-green-500">Register form</h2>

    <form method="POST" action="{{ route('user.register') }}">
        @csrf

        <div class="flex flex-wrap w-full">
            <div>
                <label class="text-green-500 font-semibold">First name:</label>
                <input class="w-full rounded-md border border-green-500" type="text" name="first_name" required><br><br>

                <label class="text-green-500 font-semibold">Email:</label>
                <input class="w-full rounded-md border border-green-500" type="text" name="email" required><br><br>

                <label class="text-green-500 font-semibold">Password:</label>
                <input class="w-full rounded-md border border-green-500" type="password" name="password" required><br><br>
                
                <label class="text-green-500 font-semibold">Country:</label>
                <select class="w-full rounded-md border border-green-500" name="country" required>
                <option value="" disabled selected>Select a country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                @endforeach
                </select>
                <br><br>
            </div>
            <div class="ml-auto">
                <label class="text-green-500 font-semibold">Last name:</label>
                <input class="w-full rounded-md border border-green-500" type="text" name="last_name" required><br><br>
                
                <label class="text-green-500 font-semibold">Phone number:</label>
                <input class="w-full rounded-md border border-green-500" type="text" name="phone" required><br><br>

                <label class="text-green-500 font-semibold">Confirm password:</label>
                <input class="w-full rounded-md border border-green-500" type="password" name="password_confirmation" required><br><br>

                <label class="text-green-500 font-semibold">Region:</label>
                <select class="w-full rounded-md border border-green-500" name="region" required>
                    <option value="Ahafo">Ahafo</option>
                    <option value="Ashanti">Ashanti</option>
                    <option value="Bono">Bono</option>
                </select><br><br>
            </div>
        </div>

        <label class="text-green-500 font-semibold">Select one of the following:</label><br>
        <select class="w-full rounded-md border border-green-500" name="user_type" required>
            <option value="Entrepreneur">Entrepreneur</option>
            <option value="Investor">Investor</option>
            <option value="Business">Business</option>
            <option value="Partner/NGO">Partner/NGO</option>
        </select>

        {{-- <div class="form-group">
            <label for="sectors" class="text-green-500 font-semibold">Sectors</label>
            <select class="form-control" id="sectors" name="sectors[]" required multiple>
                @foreach($sectors as $sector)
                    <option class="text-md font-medium" value="{{ $sector->sector_name }}">{{ $sector->sector_name }}</option>
                @endforeach
            </select>
            @if ($errors->has('sectors'))
                <span class="text-red-500 text-sm">{{ $errors->first('sectors') }}</span>
            @endif
        </div> --}}

        <button type="submit" class="bg-red-500 text-white font-semibold px-6 py-2 mt-10 mx-auto flex rounded hover:bg-[#006f62] transition duration-300">Submit</button>
    </form>

</div>

<!-- jQuery and Toastr JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Toastr Notification Script -->
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

@endsection