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

    <!-- Styles -->
    <style>
        header {
            background: red;
            color: white
        }

        main {
            background: white;
        }

        footer {
            background: red;
            color: white
        }

        body {
            font-family: 'Saira Condensed', sans-serif;
            color: black;
        }
    </style>
</head>

<body class="flex flex-col h-screen">
    <header>
        <nav class="p-2 bg-red shadow md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <img class="h-10 inline" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <ul class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden"
                    style="background-color: red;">
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="#" class="text x1 text-cyan-500" style="background-color: red;">HOME</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="#" class="text x1 hover:text-cyan-500 duration-500"
                            style="background-color: red;">ABOUT</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="#" class="text x1 hover:text-cyan-500 duration-500"
                            style="background-color: red;">CALENDAR</a>
                    </li>

                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="#" class="text x1 hover:text-cyan-500 duration-500"
                            style="background-color: red;">RANKING</a>
                    </li>

                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/contacts') }}" class="text x1 hover:text-cyan-500 duration-500"
                            style="background-color: red;">CONTACT</a>
                    </li>
                </ul>
                <span class="text-3xl cursor-pointer mx-2 md:hidden block" onclick="toggleMenu()">
                    <ion-icon name="menu" id="menuIcon"></ion-icon>
                </span>

                <div x-data="{ open: false }" class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <div class="relative">
                        <a href="#" @click="open = !open">
                            <img class="h-7 inline" src="{{ asset('loginicon.png') }}" alt="Login Icon">
                        </a>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py=0">
                            <a href="{{ route('login') }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500">Login</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-400">Register</a>
                            @endif
                        </div>
                    </div>
                    @endauth
                    @endif
                </div>
        </nav>
    </header>


    <main class="bg-white flex-1">
        <img src="{{asset('backgroundimage.png')}}" alt="" srcset="" class="w-full">
        SCHRIJF JE IN!
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
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4V1JRM/CJhqFWE4/gs1SMgeu+2SL1OrS5t9jQQI4Im7oJ/rRlFxG/X+De4eL9ES"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
            let menuInitialized = fals                function toggleM                        let list = document.querySele            ');
            let menuIcon = document.getElementByI            con');

            if (                ized) {
                list.c                ('hidden');
                        Ini             = true;
            }

            if (l                t.contains('hidden')) {
                         classList.remove('hidden'                       menuIcon.name = 'close';
                    lis                add('top-[60px]');
                                         list.class                dden');
                menuIcon.name            ';              list.classList.remove('top-[60px]');
            }
        }
    </script>
</body>

</html>