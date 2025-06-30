@extends('theme::layouts.app')

@section('content')

<div>

    <div class="bg-blue-500">

        <div class="max-w-6xl px-5 mx-auto lg:px-0">
            <div class="pt-20 pb-20">
                <h1 class="text-center text-white text-5xl font-bold"> Unlocking the next startup <br> opportunity </h1>
                <p class="text-center text-white text-xl font-light pt-7"> VC4A is the leading platform supporting entrepreneurs, mentors, investors and business <br>
                    professionals, strengthening the startup community in Africa, Latin America and beyond. </p>
            </div>
        </div>

        <div class="max-w-7xl px-5 mx-auto lg:px-0 pb-20">

            <div class="flex flex-wrap justify-center gap-5">
                <div class="bg-white mx-auto rounded-md" style="width:290px; height:290px">
                    <div class="py-7 flex justify-center">
                        <div style="width:85px; height:85px" class="bg-blue-500 rounded-full flex items-center justify-center">
                            <img class="w-8 h-8 object-contain" src="{{ asset('themes/tailwind/images/beg.png')}}" alt="" />
                        </div>
                    </div>
                    <h4 class="font-semibold text-center text-xl">For Entrepreneurs</h4>
                    <p class="pt-1 text-center text-md">Accelerate your business <br> venture</p>
                    <div class="flex space-x-2 justify-center pt-7">
                        <p class="text-center text-color text-md">
                        <a href="https://trade.atdamss.com/venture">Learn more</a> </p>
                        <a href="https://trade.atdamss.com/venture"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                    </div>
                </div>

                <div class="bg-white mx-auto rounded-md" style="width:290px; height:290px">
                    <div class="py-7 flex justify-center">
                        <div style="width:85px; height:85px" class="bg-blue-500 rounded-full flex items-center justify-center">
                            <img class="w-8 h-8 object-contain" src="{{ asset('themes/tailwind/images/beg.png')}}" alt="" />
                        </div>
                    </div>
                    <h4 class="font-semibold text-center text-xl">For Investors</h4>
                    <p class="pt-1 text-center text-md">Get exclusive access to startups that match your investment criteria</p>
                    <div class="flex space-x-2 justify-center pt-7">
                        <p class="text-center text-color text-md">
                        <a href="https://trade.atdamss.com/venture">Learn more</a> </p>
                        <a href="https://trade.atdamss.com/venture"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                    </div>
                </div>

                <div class="bg-white mx-auto rounded-md" style="width:290px; height:290px">
                    <div class="py-7 flex justify-center">
                        <div style="width:85px; height:85px" class="bg-blue-500 rounded-full flex items-center justify-center">
                            <img class="w-8 h-8 object-contain" src="{{ asset('themes/tailwind/images/beg.png')}}" alt="" />
                        </div>
                    </div>
                    <h4 class="font-semibold text-center text-xl">For Programs</h4>
                    <p class="pt-1 text-center text-md">Manage startup accelration <br> program in one place</p>
                    <div class="flex space-x-2 justify-center pt-7">
                        <p class="text-center text-color text-md">
                        <a href="https://trade.atdamss.com/programs">Learn more</a> </p>
                        <a href="https://trade.atdamss.com/programs"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                    </div>
                </div>

                <div class="bg-white mx-auto rounded-md" style="width:290px; height:290px">
                    <div class="py-7 flex justify-center">
                        <div style="width:85px; height:85px" class="bg-blue-500 rounded-full flex items-center justify-center">
                            <img class="w-8 h-8 object-contain" src="{{ asset('themes/tailwind/images/beg.png')}}" alt="" />
                        </div>
                    </div>
                    <h4 class="font-semibold text-center text-xl">For Mentors</h4>
                    <p class="pt-1 text-center text-md">Contribute Your Knowledge and <br> create an impact</p>
                    <div class="flex space-x-2 justify-center pt-7">
                    <p class="text-center text-color text-md">
                    <a href="https://trade.atdamss.com/mentor">Learn more</a> </p>
                    <a href="https://trade.atdamss.com/mentor"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl px-5 mx-auto lg:px-0 pt-20">
      <!--  <h3 class="text-3xl text-color font-bold pt-10">Trusted by global partners</h3>
        <p class="pt-2">Our track record shows we are a trusted partner and point of reference for founders, <br>
            entrepreneur support organizations and investors in emerging markets.</p>  -->

      <!--  <div class="flex flex-wrap  gap-6 justify-center pt-12 m">
            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px " src="https://cdn1.vc4a.com/media/2024/10/IFC-WBG-horizontal-RGB-2.png" alt="" />
            </div>

            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src="https://cdn1.vc4a.com/media/2024/10/GSMA-Logo-Red-RGB-2022-1-e1731059168470-290x109.png" alt="" />
            </div>

            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src="https://cdn1.vc4a.com/media/2023/05/mest.png" alt="" />
            </div>

            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src="https://cdn1.vc4a.com/media/2023/05/KFW-DEG--290x61.png" alt="" />
            </div>

            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src="https://cdn1.vc4a.com/media/2023/05/giz-short.png" alt="" />
            </div>

            <div class=" bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src="https://cdn1.vc4a.com/media/2023/05/south-pole-290x60.png" alt="" />
            </div>

            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src="https://cdn1.vc4a.com/media/2024/10/LUXDEV_logo.png" alt="" />
            </div>

            <div class="bg-custom-400 mx-auto flex justify-center py-3 rounded-sm" style="width: 250px;">
                <img style="width:180px; height:30px" src=" https://cdn1.vc4a.com/media/2023/05/deloitte-290x76.png" alt="" />
            </div>
        </div>  -->

        <div class="flex flex-wrap gap-6 justify-between pt-20 mt-10">
            <img style="width:500px; height:350px;" src=" https://cdn1.vc4a.com/media/2025/01/Entrepreneur-smiling_homepage.jpg" alt="" />
            <div class="pt-4">
                <p class="text-custom font-bold text-sm"> For Entrepreneurs </p>
                <h5 class="mt-2 text-color text-xl font-bold"> Accelerate your business venture </h5>
                <div class="flex mt-4">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Join 27,000+ venture founders around the world who use VC4A to <br> scale their startup. </p>
                </div>
                <div class="flex my-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Promote your fundraising roundsInstantly apply to accelerator <br> programs in your region </p>
                </div>
                <div class="flex">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Learn by accessing free courses in our startup academy </p>
                </div>
                <div class="flex mt-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Access one-on-one mentorship from experts </p>
                </div>
                <div class="flex space-x-2 px-4 py-3 mt-6 border-2 rounded-md" style="border-color: #065367; width:152px; ">
                    <p class="text-center text-color text-md"> <a href="https://trade.atdamss.com/venture">Learn more</a> </p>
                  <a href="https://trade.atdamss.com/venture">  <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                </div>
            </div>
        </div>

        <div class="flex gap-6 justify-between pt-20 mt-10" style="flex-wrap: wrap-reverse;">
            <div class=" pt-4">
                <p class="text-custom font-bold text-sm"> For Investors </p>
                <h5 class="mt-2 text-color text-xl font-bold"> Accelerate your business venture </h5>
                <div class="flex mt-4">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Join 27,000+ venture founders around the world who use VC4A to <br> scale their startup. </p>
                </div>
                <div class="flex my-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Promote your fundraising roundsInstantly apply to accelerator <br> programs in your region </p>
                </div>
                <div class="flex">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Learn by accessing free courses in our startup academy </p>
                </div>
                <div class="flex mt-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Access one-on-one mentorship from experts </p>
                </div>
                <div class="flex space-x-2 px-4 py-3 mt-6 border-2 rounded-md" style="border-color: #065367; width:152px; ">
                    <p class="text-center text-color text-md"> <a href="https://trade.atdamss.com/venture">Learn more</a> </p>
                    <a href="https://trade.atdamss.com/venture"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                </div>
            </div>
            <img style="width:500px; height:350px;" src="https://cdn1.vc4a.com/media/2025/01/New-investor-pic_main-landing-page.png" alt="" />
        </div>
    </div>

    <div class="bg-color mt-20">
        <div class="max-w-6xl px-5 mx-auto lg:px-0">
            <h1 class="text-center text-3xl text-white font-bold py-20"> Our track record </h1>
            <div class="flex flex-wrap gap-6 justify-center text-center pb-20">
                <div class="mx-auto">
                    <h1 class=" text-white text-3xl font-bold text-center"> 220,000+ </h1>
                    <p class="text-white text-xl mt-2 text-center"> community members using VC4A </p>
                </div>
                <div class="mx-auto">
                    <h1 class=" text-white text-3xl font-bold text-center"> 2,300+ </h1>
                    <p class="text-white text-xl mt-2 text-center"> startup program organizers </p>
                </div>
                <div class="mx-auto">
                    <h1 class=" text-white text-3xl font-bold text-center"> 25,000+ </h1>
                    <p class="text-white text-xl mt-2 text-center"> business ventures on the platform </p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl px-5 mx-auto lg:px-0 ">

        <div class="flex flex-wrap gap-6 justify-between  pt-20 mt-10">
            <img style="width:500px; height:350px;" src=" https://cdn1.vc4a.com/media/2025/01/organizations-main-landing-page-600x450.jpg" alt="" />
            <div class="pt-4">
                <p class="text-custom font-bold text-sm"> For Programs </p>
                <h5 class="mt-2 text-color text-xl font-bold"> Accelerate your business venture </h5>
                <div class="flex mt-4">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Join 27,000+ venture founders around the world who use VC4A to <br> scale their startup. </p>
                </div>
                <div class="flex my-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Promote your fundraising roundsInstantly apply to accelerator <br> programs in your region </p>
                </div>
                <div class="flex">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Learn by accessing free courses in our startup academy </p>
                </div>
                <div class="flex mt-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Access one-on-one mentorship from experts </p>
                </div>
                <div class="flex space-x-2 px-4 py-3 mt-6 border-2 rounded-md" style="border-color: #065367; width:152px; ">
                    <p class="text-center text-color text-md"> <a href="https://trade.atdamss.com/programs">Learn more</a> </p>
                    <a href="https://trade.atdamss.com/programs"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                </div>
            </div>
        </div>


        <div class="flex justify-between gap-6 pt-20 mt-10" style="flex-wrap: wrap-reverse;">
            <div class="pt-4">
                <p class="text-custom font-bold text-sm"> For Mentors </p>
                <h5 class="mt-2 text-color text-xl font-bold"> Accelerate your business venture </h5>
                <div class="flex mt-4">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Join 27,000+ venture founders around the world who use VC4A to <br> scale their startup. </p>
                </div>
                <div class="flex my-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Promote your fundraising roundsInstantly apply to accelerator <br> programs in your region </p>
                </div>
                <div class="flex">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Learn by accessing free courses in our startup academy </p>
                </div>
                <div class="flex mt-2">
                    <img class="w-4 h-4 mt-1 object-contain" src="{{ asset('themes/tailwind/images/yes.png')}}" alt="" />
                    <p class="ml-3"> Access one-on-one mentorship from experts </p>
                </div>
                <div class="flex space-x-2 px-4 py-3 mt-6 border-2 rounded-md" style="border-color: #065367; width:152px; ">
                    <p class="text-center text-color text-md"> <a href="https://trade.atdamss.com/mentor">Learn more</a> </p>
                    <a href="https://trade.atdamss.com/mentor"> <img style="width:16px; height:16px; margin-top:4px" src="{{ asset('themes/tailwind/images/error.png')}}" alt="" /> </a>
                </div>
            </div>
            <img style="width:500px; height:350px;" src="https://cdn1.vc4a.com/media/2025/01/New-mentor-photo_main-landing-page-600x450.png" alt="" />
        </div>

    </div>

</div>

@endsection