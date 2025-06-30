@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto sm:mt-10 mt-5 lg:px-0">

    <style>
        #menu a {
            text-decoration: none;
            color: inherit;
            outline: none;
        }

        /* Style when clicking or focusing */
        #menu a:focus,
        #menu a:active {
            text-decoration: underline;
            color: white;

        }

        /* Style for default active item */
        #menu a.active {
            text-decoration: underline;
            color: white;
            font-weight: bold;
            background-color: #24b3bd;
        }
    </style>

    <div class="sm:flex gap-6">
        <img src="https://media.istockphoto.com/id/1313843101/vector/blue-logistics-logo-with-lines-highway-vector.jpg?s=612x612&w=0&k=20&c=8mueJQSnrwO6Mr-oRp12v3drokq1RJJZj6PWvmFjmWY=" alt="img" width="100px" />
        <div class="mt-3 sm:mt-0">
            <h1 class="text-2xl font-bold text-color">Logistics</h1>
            <p class="text-balance">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae nulla dolorum architecto autem cum accusamus ea explicabo facere possimus, repudiandae illum cumque veniam aperiam odit animi fuga necessitatibus. Autem, voluptatem!</p>
            <div class="flex gap-5">
                <button class="bg-color font-medium py-1 text-white mt-2 px-4 rounded-md hover:bg-black hover:text-white">Fundraising</button>
                <img style="width: 28px; height:28px;" class="mt-2" src="{{ asset('themes/tailwind/images/aa.png')}}" alt="" />
                <img style="width: 28px; height:28px;" class="mt-2" src="{{ asset('themes/tailwind/images/fec.png')}}" alt="" />
                <img style="width: 28px; height:28px;" class="mt-2" src="{{ asset('themes/tailwind/images/loc.png')}}" alt="" />
            </div>
        </div>
    </div>
    <hr class="bg-color mt-5 sm:mt-10" style="height:1.9px;">

    <div class="md:flex gap-10 md:mt-10 mt-5">

        <ul id="menu" class="bg-color px-3 py-6 rounded-md " style="height:414px">
            <li class="mt-2 group flex px-2 space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Overview">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/icons.png') }}" alt="" />
                <a href="#Overview" class="group-hover:text-black block px-2 sm:py-2 py-1">Overview</a>
            </li>
            <li class="mt-4 group px-2 flex space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Team">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/team.png') }}" alt="" />
                <a href="#Team" class="group-hover:text-black block px-2 sm:py-2 py-1">Team</a>
            </li>
            <li class="mt-4 group px-2 flex space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Traction">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/traction.png') }}" alt="" />
                <a href="#Traction" class="group-hover:text-black block px-2 sm:py-2 py-1">Traction</a>
            </li>
            <li class="mt-4 group px-2 flex space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Fundraising">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/fundraising.png') }}" alt="" />
                <a href="#Fundraising" class="group-hover:text-black block px-2 sm:py-2 py-1">Fundraising</a>
            </li>
            <li class="mt-4 group px-2 flex space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Documents">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/documents.png') }}" alt="" />
                <a href="#Documents" class="group-hover:text-black block px-2 sm:py-2 py-1">Documents</a>
            </li>
            <li class="mt-4 group px-2 flex space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Impact">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/impact.png') }}" alt="" />
                <a href="#Impact" class="group-hover:text-black block px-2 sm:py-2 py-1">Impact</a>
            </li>
            <li class="mt-4 group px-2 flex space-x-2 font-semibold sm:text-2xl text-xl text-white rounded-md hover:bg-color cursor-pointer items-center" data-target="Blogs">
                <img class="w-8 h-7 group-hover:filter group-hover:brightness-0 group-hover:invert" src="{{ asset('themes/tailwind/images/blogs.png') }}" alt="" />
                <a href="#Blogs" class="group-hover:text-black block px-2 sm:py-2 py-1">Blogs</a>
            </li>
        </ul>

        <div style="height: auto; width:1px; margin-inline: auto;;" class="bg-color"></div>

            <div id="Team" class="section ml-auto mt-6 md:mt-0" style="display:none;">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1359803303/photo/clean-energy-logistics-ideas.jpg?s=612x612&w=0&k=20&c=-Xg6zbBPkzYtuGjZtDeP4U4alkg2q8QmKgFK1j9WRUo=" alt="img" />
            <h2 class="text-2xl text-color font-bold mt-10"> Team </h2>
            <p class="mt-6 text-balance"> ASSI Christian, co-founder and CTO of Graya, brings exceptional technological expertise and a clear
                strategic vision to <br> combat food waste. His role is essential in the design and implementation of the application's innovative
                technological <br> solutions. <br> <br>
                Francesca Seka Assi, co-founder and CCO of Graya, has a strong background in retail, having served as
                an administrative <br> and financial assistant in a major chain. Her marketing expertise and sector experience
                enable Graya to develop effective <br> strategies. <br> <br>
                Franck Sylva Boili, Head of Business and Partnerships, brings extensive experience in public relations and
                networking. He <br> cultivates strategic relationships with commercial partners, government institutions, and
                charitable organizations, playing <br> a crucial role at Graya thanks to his communication skills and extensive
                network.</p>
            <h2 class="text-xl font-bold mt-10"> Members </h2>
            <div class="sm:flex justify-between gap-6 mt-6">
                <div>
                    <h5 class="text-xl text-color font-semibold">SEKA Cho Ange Francesca epse ASSI </h5>
                    <p class="text-custom"> COO | University </p>
                    <p class="font-regular"> Francesca Seka Assi, la COO, détient une <br>
                        licence en marketing et possède une solide <br>
                        expérience dans le domaine de la grande <br>
                        distribution. Avant de rejoindre Graya, elle a <br>
                        occupé le poste d'assistante administrative <br>
                        au sein d'une grande chaîne de dist </p>
                </div> <br>
                <div>
                    <h5 class="text-xl text-color font-semibold"> Bolly Franck Sylva </h5>
                    <p class="text-custom"> COD | University </p>
                    <p class="font-regular"> Incarne l'ambition de croissance et l'esprit <br>
                        d'expansion de l'entreprise, Fort d'une <br>
                        expertise solide en développement <br>
                        commercial, il met en place des stratègies de <br>
                        partenariat et de vente ciblées pour renforcer <br>
                        la présence de Graya sur le marché. </p>
                </div>
            </div>

            <div class="sm:flex justify-between gap-6 mt-8">
                <div>
                    <h5 class="text-xl text-color font-semibold"> ASSI Atse Christian Joel in </h5>
                    <p class="text-custom"> CTO, Founder | Master </p>
                    <p class="font-regular"> Co-fondateur et CTO de Graya, fort de ses 6 <br>
                        ans d'espériences, il apporte une expertise <br>
                        technologique exceptionnelle et une vision <br>
                        stratégique claire pour tout ce qui touche aux </p>
                </div> <br>
                <div>
                    <h5 class="text-xl text-color font-semibold"> SEKA Cho Ange Francesca epse ASSI </h5>
                    <p class="text-custom"> COO | University </p>
                    <p class="font-regular"> Francesca Seka Assi, la COO, détient une <br>
                        licence en marketing et possède une solide <br>
                        expérience dans le domaine de la grande <br>
                        distribution. Avant de rejoindre Graya, elle a </p>
                </div>
            </div>

        </div>


        <div id="Traction" class="section ml-auto mt-6 md:mt-0" style="display:none;">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1513745846/video/truck-drives-on-the-road.jpg?s=640x640&k=20&c=xDUPHyFGN5MCwjVaS7c0Bv5VjRkgPvmHFlnb4z1r32Y=" alt="img" />
            <p class="mt-10 text-balance"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem quasi quisquam doloribus, ratione iure cupiditate <br> consectetur assumenda maxime doloremque tempore non eius sit tenetur minus voluptas libero et sunt obcaecati.
                Lorem <br> ipsum dolor sit amet consectetur adipisicing elit. Odio perspiciatis est aut provident repudiandae, totam suscipit delectus <br> a sint maiores optio accusamus nulla hic rem maxime? Nesciunt eum hic nisi? </p>
        </div>


        <div id="Fundraising" class="section ml-auto mt-6 md:mt-0" style="display:none;">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1450384722/photo/warehouses-with-solar-panels.jpg?s=612x612&w=0&k=20&c=fNVQrL6pz3iA3Aos0bA1pcMF3f6RVqJ1w89rLQr7syw=" alt="img" />
            <p class="mt-10 text-balance"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem quasi quisquam doloribus, ratione iure cupiditate <br> consectetur assumenda maxime doloremque tempore non eius sit tenetur minus voluptas libero et sunt obcaecati.
                Lorem <br> ipsum dolor sit amet consectetur adipisicing elit. Odio perspiciatis est aut provident repudiandae, totam suscipit delectus <br> a sint maiores optio accusamus nulla hic rem maxime? Nesciunt eum hic nisi? </p>
        </div>


        <div id="Documents" class="section ml-auto mt-6 md:mt-0" style="display:none;">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1176472379/photo/panorama-aerial-view-harbor-hamburg-container.jpg?s=612x612&w=0&k=20&c=acDQV8Dr7wvgXpP2MNIjkqV8ueqiRccHPkXg3AXA2GQ=" alt="img" />
            <p class="mt-10 text-balance"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem quasi quisquam doloribus, ratione iure cupiditate <br> consectetur assumenda maxime doloremque tempore non eius sit tenetur minus voluptas libero et sunt obcaecati.
                Lorem <br> ipsum dolor sit amet consectetur adipisicing elit. Odio perspiciatis est aut provident repudiandae, totam suscipit delectus <br> a sint maiores optio accusamus nulla hic rem maxime? Nesciunt eum hic nisi? </p>
        </div>


        <div id="Impact" class="section ml-auto mt-6 md:mt-0" style="display:none;">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1479764247/video/young-caucasian-woman-worker-and-mature-female-manager-checks-stock-inventory-with-tablet-and.jpg?s=640x640&k=20&c=ADiC_pwAtUGLmF_53N1YoWMLjRQmDx8q-bUCYhd668A=" alt="img" />
            <p class="mt-10 text-balance"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem quasi quisquam doloribus, ratione iure cupiditate <br> consectetur assumenda maxime doloremque tempore non eius sit tenetur minus voluptas libero et sunt obcaecati.
                Lorem <br> ipsum dolor sit amet consectetur adipisicing elit. Odio perspiciatis est aut provident repudiandae, totam suscipit delectus <br> a sint maiores optio accusamus nulla hic rem maxime? Nesciunt eum hic nisi? </p>
        </div>


        <div id="Blogs" class="section ml-auto mt-6 md:mt-0" style="display:none;">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1276685160/photo/wind-turbine-farm-near-the-highway.jpg?s=612x612&w=0&k=20&c=eGL40K9zWVbj_ydQVwFtKZm_6Dn2vFTZr8uih0-yt4o=" alt="img" />
            <p class="mt-10 text-balance"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem quasi quisquam doloribus, ratione iure cupiditate <br> consectetur assumenda maxime doloremque tempore non eius sit tenetur minus voluptas libero et sunt obcaecati.
                Lorem <br> ipsum dolor sit amet consectetur adipisicing elit. Odio perspiciatis est aut provident repudiandae, totam suscipit delectus <br> a sint maiores optio accusamus nulla hic rem maxime? Nesciunt eum hic nisi? </p>
        </div>


        <div id="Overview" class="section ml-auto mt-6 md:mt-0">
            <img style="width:880px; height:400px" src="https://media.istockphoto.com/id/1961756393/photo/green-cargo-container-ship-cargo-container-only-green-color-container-ship-running-in-the.jpg?s=612x612&w=0&k=20&c=1K_mdW1gmGuSk2O-z_NojGALRagVioqAmwcavJIyaVY=" alt="img" />
            <p class="mt-10 text-balance"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem quasi quisquam doloribus, ratione iure cupiditate <br> consectetur assumenda maxime doloremque tempore non eius sit tenetur minus voluptas libero et sunt obcaecati.
                Lorem <br> ipsum dolor sit amet consectetur adipisicing elit. Odio perspiciatis est aut provident repudiandae, totam suscipit delectus <br> a sint maiores optio accusamus nulla hic rem maxime? Nesciunt eum hic nisi? </p>

            <div class="md:flex justify-center gap-6 mt-10 ">

                <div class="space-y-6">
                    <div class="sm:flex rounded-xl sm:rounded-full py-2" style="border:5px solid #008b79; width:full">
                        <img class="ml-3 mt-1" style="height:80px; width:full;" src=" https://myforexrate.com/storage/features/November2024/W9MLPttwxxiExJ3Bkfrn.png" alt="img" />
                        <div class="px-4">
                            <h1 class="font-semibold text-color text-xl text-balance"> Marketplace Advantage </h1>
                            <p class="text-sm text-balance text-balance">Being a Forex marketplace, every exchange <br>
                                house here tries to outbid others. Result, you <br>
                                get the best exchange rate in the market!!</p>
                        </div>
                    </div>

                    <div class="sm:flex rounded-xl sm:rounded-full py-2" style="border:5px solid #008b79; width:full">
                        <img class="ml-3 mt-1" style="height:80px; width:full;" src=" https://myforexrate.com/storage/features/November2024/W9MLPttwxxiExJ3Bkfrn.png" alt="img" />
                        <div class="px-4">
                            <h1 class="font-semibold text-color text-xl text-balance"> Marketplace Advantage </h1>
                            <p class="text-sm text-balance">Being a Forex marketplace, every exchange <br>
                                house here tries to outbid others. Result, you <br>
                                get the best exchange rate in the market!!</p>
                        </div>
                    </div>

                    <div class="sm:flex rounded-xl sm:rounded-full py-2" style="border:5px solid #008b79; width:full">
                        <img class="ml-3 mt-1" style="height:80px; width:full;" src=" https://myforexrate.com/storage/features/November2024/W9MLPttwxxiExJ3Bkfrn.png" alt="img" />
                        <div class="px-4">
                            <h1 class="font-semibold text-color text-xl text-balance"> Marketplace Advantage </h1>
                            <p class="text-sm text-balance">Being a Forex marketplace, every exchange <br>
                                house here tries to outbid others. Result, you <br>
                                get the best exchange rate in the market!!</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 mt-6 md:mt-0">
                    <div class="sm:flex rounded-xl sm:rounded-full py-2" style="border:5px solid #008b79; width:full">
                        <img class="ml-3 mt-1" style="height:80px; width:full;" src=" https://myforexrate.com/storage/features/November2024/W9MLPttwxxiExJ3Bkfrn.png" alt="img" />
                        <div class="px-4">
                            <h1 class="font-semibold text-color text-xl text-balance"> Marketplace Advantage </h1>
                            <p class="text-sm text-balance">Being a Forex marketplace, every exchange <br>
                                house here tries to outbid others. Result, you <br>
                                get the best exchange rate in the market!!</p>
                        </div>
                    </div>

                    <div class="sm:flex rounded-xl sm:rounded-full py-2" style="border:5px solid #008b79; width:full">
                        <img class="ml-3 mt-1" style="height:80px; width:full;" src=" https://myforexrate.com/storage/features/November2024/W9MLPttwxxiExJ3Bkfrn.png" alt="img" />
                        <div class="px-4">
                            <h1 class="font-semibold text-color text-xl text-balance"> Marketplace Advantage </h1>
                            <p class="text-sm text-balance">Being a Forex marketplace, every exchange <br>
                                house here tries to outbid others. Result, you <br>
                                get the best exchange rate in the market!!</p>
                        </div>
                    </div>

                    <div class="sm:flex rounded-xl sm:rounded-full py-2" style="border:5px solid #008b79; width:full">
                        <img class="ml-3 mt-1" style="height:80px; width:full;" src=" https://myforexrate.com/storage/features/November2024/W9MLPttwxxiExJ3Bkfrn.png" alt="img" />
                        <div class="px-4">
                            <h1 class="font-semibold text-color text-xl text-balance"> Marketplace Advantage </h1>
                            <p class="text-sm text-balance">Being a Forex marketplace, every exchange <br>
                                house here tries to outbid others. Result, you <br>
                                get the best exchange rate in the market!!</p>
                        </div>
                    </div>
                </div>





            </div>

        </div>
    </div>



</div>




<script>
    // Wait for DOM load
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.getElementById("menu");
        const sections = document.querySelectorAll(".section");

        menu.addEventListener("click", (e) => {
            e.preventDefault();

            // Find the <li> clicked or its child <a>
            let targetLi = e.target.closest("li[data-target]");
            if (!targetLi) return;

            let targetId = targetLi.getAttribute("data-target");

            // Hide all sections
            sections.forEach(section => {
                section.style.display = "none";
            });

            // Show target section
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.style.display = "block";

                // Smooth scroll to the section top
                targetSection.scrollIntoView({
                    behavior: "smooth"
                });
            }
        });
    });
</script>



@endsection