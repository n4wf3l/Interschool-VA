<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Browser Logo & Title -->
    <title>Interschool Voetbal App</title>
    <link rel="icon" href="{{ asset('erasmuslogo2.png') }}" type="image/x-icon" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css blades/welcome.blade.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
            integrity = "sha512-xxcJrt0DJGmWdNvhLvGFKV5qZjF5gOvveaBB8VLVJtfBuzxZZ5l70oVxXmYmmujpZyGx2t49geTmO2NlQmRj5g=="
            crossorigin = "" ></script>
</head>

<body class="flex flex-col h-screen">

    <header>
        <nav class="p-2 bg-red shadow md:flex md:items-center md:justify-between fixed w-full top-0 z-50"
            style="background-color: red;">
            <div class="flex items-center justify-between">
                <!--Erasmus logo -->
                <img class="h-10 inline" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <!--Hamburger menu for responsive  -->
                <span class="text-3xl cursor-pointer mx-10 mt-2 md:hidden block" onclick="toggleMenu()">
                    <ion-icon name="menu" id="menuIcon"></ion-icon>
                </span>

                <!--Navigation list -->
                <ul class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden"
                    style="background-color: red;">
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">HOME</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/about') }}" class="text x1 text-teal-500"
                            style="background-color: red;">ABOUT</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/calendars') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">CALENDAR</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/rankings') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">RANKING</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/contacts') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">CONTACT</a>
                    </li>
                    @if(auth()->check() && (auth()->user()->admin === 0))
                    <p class="hidden md:inline">|</p>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/myteam') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">MyTEAM</a>
                    </li>
                    @endif
                    @if(auth()->check() && (auth()->user()->admin === 1))
                    <p class="hidden md:inline">|</p>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/admins') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">MyADMIN</a>
                    </li>
                    @endif
                </ul>

                <!--Login list icon-->
                <div x-data="{ open: false }"
                    class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10 transition-transform transform-gpu hover:scale-110">
                    <div class="relative">
                        <a href="#" @click="open = !open">
                            <img class="h-7 inline @auth bg-green-700 rounded-full @endauth"
                                src="{{ asset('loginicon.png') }}" alt="Login Icon">
                        </a>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py-0">
                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <p class="text-white bg-teal-500 text-center text-xs">{{ Auth::user()->name }}</p>
                                <a href="#"
                                    class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</a>
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                class="block px-5 py-2 text-sm text-gray-700 @auth hover:bg-green-500 @else hover:bg-red-500 @endauth">Login</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-400">Register</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
        </nav>
    </header>



    <main class="mt-20">

        <div class="flex flex-row items-center ml-10">
            <!-- Design 2 Vertical -->

            <div class="relative flex items-end pb-12">

                <!-- Red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                <!-- Blue line, positioned to overlap the red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <!-- Titre -->
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">ABOUT</h2>
        </div>

        <p class="pl-20 pr-20 text-2xl text-center pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et
            diam vel
            ligula malesuada pellentesque. Curabitur auctor, risus quis tempor tincidunt, tortor mi convallis nulla,
            ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id aliquet euismod. In hac habitasse platea
            dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo dui fermentum at. Lorem ipsum dolor
            sit
            amet, consectetur adipiscing elit. Sed et diam vel ligula malesuada pellentesque. Curabitur auctor, risus
            quis
            tempor tincidunt, tortor mi convallis nulla, ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id
            aliquet euismod. In hac habitasse platea dictumst. Nulla facilisi. Integer auctor consequat libero, ac
            commodo
            dui fermentum at.</p>
        <p class="pl-20 pr-20 text-2xl text-center ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et
            diam vel
            ligula malesuada pellentesque. Curabitur auctor, risus quis tempor tincidunt, tortor mi convallis nulla,
            ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id aliquet euismod. In hac habitasse platea
            dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo dui fermentum at. Lorem ipsum dolor
            sit
            amet, consectetur adipiscing elit. Sed et diam vel ligula malesuada pellentesque. Curabitur auctor, risus
            quis
            tempor tincidunt, tortor mi convallis nulla, ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id
            aliquet euismod. In hac habitasse platea dictumst. Nulla facilisi. Integer auctor consequat libero, ac
            commodo
            dui fermentum at.</p>

        <div class="relative flex flex-row-reverse items-center ml-10">
            <!-- Design 2 Vertical à droite -->
            <div class="absolute top-0 right-0 flex flex-col items-end">
                <!-- Red line -->
                <div class="mb-3 h-32 w-4 bg-red-500"></div>
                <!-- Blue line, positioned to overlap the red line -->
                <div class="mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>

    </main>

    <main>

        <div class="flex flex-row items-center ml-10">
            <!-- Design 2 Vertical -->

            <div class="relative flex items-end pb-12">

                <!-- Red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                <!-- Blue line, positioned to overlap the red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <!-- Titre -->
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">REGELS</h2>
        </div>

        <p class="pl-20 pr-20 text-2xl text-center pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            et
            diam vel
            ligula malesuada pellentesque. Curabitur auctor, risus quis tempor tincidunt, tortor mi convallis nulla,
            ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id aliquet euismod. In hac habitasse platea
            dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo dui fermentum at. Lorem ipsum dolor
            sit
            amet, consectetur adipiscing elit. Sed et diam vel ligula malesuada pellentesque. Curabitur auctor, risus
            quis
            tempor tincidunt, tortor mi convallis nulla, ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id
            aliquet euismod. In hac habitasse platea dictumst. Nulla facilisi. Integer auctor consequat libero, ac
            commodo
            dui fermentum at.</p>
        <p class="pl-20 pr-20 text-2xl text-center ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et
            diam
            vel
            ligula malesuada pellentesque. Curabitur auctor, risus quis tempor tincidunt, tortor mi convallis nulla,
            ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id aliquet euismod. In hac habitasse platea
            dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo dui fermentum at. Lorem ipsum dolor
            sit
            amet, consectetur adipiscing elit. Sed et diam vel ligula malesuada pellentesque. Curabitur auctor, risus
            quis
            tempor tincidunt, tortor mi convallis nulla, ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id
            aliquet euismod. In hac habitasse platea dictumst. Nulla facilisi. Integer auctor consequat libero, ac
            commodo
            dui fermentum at.</p>
    </main>

    <main class="mx-auto mt-20">
        <!-- Titre -->
        <div class="flex items-center mb-4 ml-10">
            <!-- Design 2 Vertical -->
            <div class="relative flex items-end pb-12">
                <!-- Red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                <!-- Blue line, positioned to overlap the red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">ONZE CAMPUSSEN</h2>
        </div>

        <div class="w-full flex flex-row items-center justify-evenly">
            <!-- Image à 50% -->
            <img src="{{ asset('erasmusgebouw.png') }}" alt="" class="w-1/2 h-200 md:w-1/5 mb-4">

            <!-- Adresses -->
            <div class="flex flex-col ml-4">
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Nijverheidskaai 170, 1070 Anderlecht (Campus Kaai)</p>
                </div>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Zespenningenstraat 70, 1000 Brussel (Campus Bloemenhof)</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Laarbeeklaan 121, 1090 Jette (Campus Jette)</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Slotstraat 28, 1000 Brussel (Campus Kanal)</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Regentschapsstraat 30, 1000 Brussel (Campus KCB)</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Delaunoystraat 58, 1080 Sint-Jans Molenbeek (Campus RITCS - Bottelarij)</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Dansaertstraat 70, 1000 Brussel (Campus RITCS - Dansaert)</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Emile Grysonlaan 1, 1070 Anderlecht (Campus COOVI)</p>
                </div>
            </div>
        </div>
        <div id="map" style="height: 400px;"></div>
    </main>

    <footer>
        <div class="bg-red p-4 text-white flex flex-col md:flex-row justify-center items-center">
            <!-- Eerste kolom (data) -->
            <div class="w-full md:w-1/2 flex flex-col items-center mb-4 md:mb-0">
                <div class="flex items-center">
                    <img src="{{asset('positionicon.png')}}" class="h-6">
                    <p class="ml-2 text-sm">Nijverheidskaai, Anderlecht 1070</p>
                </div>
                <div class="flex items-center mt-2">
                    <img src="{{asset('icontel.png')}}" class="h-6">
                    <p class="ml-2 text-sm">+32 499 84 25 25</p>
                </div>
                <div class="flex items-center mt-2">
                    <img src="{{asset('messagelogo.png')}}" class="h-6">
                    <p class="ml-2 text-sm">info.va.ehb@gmail.com</p>
                </div>
            </div>

            <!-- Tweede kolom (logo erasmus) -->
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <img class="h-5" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <p class="mt-2 text-sm">&#169 Erasmushogeschool</p>
            </div>

            <!-- Derde kolom (social media)-->
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="flex space-x-2">
                    <a href="#" class="text-white"><img src="{{asset('iconfacebook.png')}}" class="h-6"></a>
                    <a href="#" class="text-white"><img src="{{asset('iconlinkedin.png')}}" class="h-6"></a>
                    <a href="#" class="text-white"><img src="{{asset('iconyoutube.png')}}" class="h-6"></a>
                </div>
                <div class="text-center mt-2">
                    <p class="text-sm mx-2 pl-4 pr-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit.
                        Integer vestibulum efficitur sapien, id laoreet risus fringilla nec.
                    </p>
                </div>
            </div>
        </div>


        <script>
            const map = L.map('map').setView([50.85045, 4.34878], 12);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            L.marker([50.841778, 4.322869]).addTo(map);

        </script>

    </footer>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4V1JRM/CJhqFWE4/gs1SMgeu+2SL1OrS5t9jQQI4Im7oJ/rRlFxG/X+De4eL9ES"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js blades/about.blade.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>