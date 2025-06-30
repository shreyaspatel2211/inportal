@extends('theme::layouts.app')

@section('content')

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

    <h2 class="font-bold text-3xl py-10 pb-12 text-green-500">Register form Register form Register form</h2>

    <form>
        <div class="flex flex-wrap w-full">
            <div>
                <label for="fname" class="text-green-500 font-semibold">First name:</label>
                <input class="w-full rounded-md border border-green-500" type="text" id="fname" name="fname" value="John"><br><br>

                <label for="lname1" class="text-green-500 font-semibold">Last name 1:</label>
                <input class="w-full rounded-md border border-green-500" type="text" id="lname1" name="lname1" value="Doe"><br><br>

                <label for="lname2" class="text-green-500 font-semibold">Last name 2:</label>
                <input class="w-full rounded-md border border-green-500" type="text" id="lname2" name="lname2" value="Doe"><br><br>
            </div>
            <div class="ml-auto">
                <label for="lname3" class="text-green-500 font-semibold">Last name 3:</label>
                <input class="w-full rounded-md border border-green-500" type="text" id="lname3" name="lname3" value="Doe"><br><br>

                <label for="lname4" class="text-green-500 font-semibold">Last name 4:</label>
                <input class="w-full rounded-md border border-green-500" type="text" id="lname4" name="lname4" value="Doe"><br><br>

                <label for="lname5" class="text-green-500 font-semibold">Last name 5:</label>
                <input class="w-full rounded-md border border-green-500" type="text" id="lname5" name="lname5" value="Doe"><br><br>
            </div>
        </div>

        <label for="cars" class="text-green-500 font-semibold">Choose a car:</label><br>
        <select class="w-full rounded-md border border-green-500" id="cars" name="cars">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="fiat">Fiat</option>
            <option value="audi">Audi</option>
        </select>

        <button type="submit" class="bg-red-500  text-white font-semibold px-6 py-2 mt-10 mx-auto flex rounded hover:bg-[#006f62] transition duration-300">Submit</button>

    </form>

</div>

@endsection