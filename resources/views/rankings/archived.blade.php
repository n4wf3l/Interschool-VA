<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Browser Logo & Title -->
    <title>Ranking — EhB Voetbal App</title>
    <link rel="icon" href="{{ asset('erasmuslogo2.png') }}" type="image/x-icon" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css blades/ranking.blade.css') }}">
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
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">DASHBOARD</a>
                        @else
                        <a href="{{ url('/') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">HOME</a>
                        @endauth
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/about') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">OVER ONS</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/calendars') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">KALENDER</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/rankings') }}" class="text x1 text-teal-500"
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
                                <p class="text-white bg-teal-500 text-center text-xs pb-2">{{ Auth::user()->name }} <img
                                        onclick="window.location.href='{{ url('profile') }}'"
                                        class="hover:bg-red-500 h-3 inline @auth rounded-full @endauth"
                                        src="{{ asset('iconsettings.png') }}" alt="Settings Icon"></p>
                                <a href="#"
                                    class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</a>
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                class="block px-5 py-2 text-sm text-gray-700 @auth hover:bg-green-500 @else hover:bg-red-500 @endauth">Log
                                in</a>
                            @if (Route::has('register'))
                            <a href="{{ route('registerteams') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-400">Inschrijving</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
        </nav>
    </header>

    <div class="flex flex-1">
        <main class="w-full mt-15 items-center" style="background-image: url('{{ asset('geschiedenisbg.jpg') }}');">
            <div class="flex flex-row items-center">
                <!-- Design 2 Vertical -->
                <div class="relative flex items-end pb-20 ml-5 mt-20">
                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
                </div>

                <!-- Titre -->
                <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5 text-white">GESCHIEDENIS</h2>
            </div>

            <!-- Conteneur pour le Dropdown -->
            <div class="w-full mb-4 flex items-center justify-center">
                <form action="{{ route('rankings.archived') }}" method="GET"
                    class="w-full max-w-md p-4 rounded-md shadow-md rounded-lg shadow-md border rounded-lg shadow-lg">
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2 text-white" for="year">Kies Jaar:</label>
                        <div class="relative">
                            <select name="year" id="year"
                                class="form-select block w-full leading-5 appearance-none bg-gray-200 border border-gray-300 hover:border-gray-500 px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                                onchange="this.form.submit()">
                                <option value="">GOAT</option>
                                @foreach ($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear==$year ? 'selected' : '' }}>{{ $year }}
                                </option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-row w-full">
                <!-- Conteneur pour les Rankings -->
                <div
                    class="w-full md:w-1/2 md:pr-2 flex flex-col items-center justify-center p-4 rounded-lg shadow-md border rounded-lg shadow-lg">
                    {{-- Displaying the Rankings --}}
                    @if ($rankings->isNotEmpty())
                    <div class="mb-4">
                        <h2 class="text-white text-lg font-bold mb-2">RANKING IN {{ $selectedYear ?: 'All Years' }}</h2>
                        <table class="table-auto text-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-center">Team</th>
                                    <th class="px-4 py-2 text-center">Aantal Pt.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rankings->take(10) as $ranking)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $ranking->teamname }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $ranking->points }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-white">Geen ranglijsten beschikbaar voor het geselecteerde jaar.</p>
                    @endif
                </div>

                <!-- Conteneur pour Topscorer -->
                @if ($rankings->isNotEmpty())
                <div
                    class="w-full md:w-1/2 mt-4 md:mt-0 md:pl-2 flex flex-col items-center justify-center p-4 rounded-lg shadow-md border rounded-lg shadow-lg">
                    <h2 class="text-white text-lg font-bold mb-2">TOPSCORER IN {{ $selectedYear ?: 'All Years' }}</h2>
                    <table class="table-auto text-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-center">Speler</th>
                                <th class="px-4 py-2 text-center">Aantal Dp.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $topscorer->topscorer_name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $topscorer->topscorer_goals }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-white">Geen ranglijsten beschikbaar voor het geselecteerde jaar.</p>
                @endif

                <!-- Reste de votre contenu principal -->
                <!-- ... -->
            </div>
            <div class="flex flex-1 flex-col items-center">
                <p class="text-white mt-5">Terug naar</p>
                <button type="submit" onclick="window.location.href='{{ url('rankings') }}'"
                    class="mt-1 mb-5 bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
                    RANKING
                </button>
            </div>
    </div>
    </main>



    <footer class="mt-auto">
        <div class="bg-red p-4 text-white flex flex-col md:flex-row justify-center items-center">
            <div class="w-full md:w-1/2 flex flex-col items-center mb-4 md:mb-0">
                <div class="flex items-center">
                    <a href="{{ url('about') }}#onze-campussen">
                        <img src="{{asset('positionicon.png')}}" class="h-6">
                    </a>
                    <p class="ml-2 text-sm">Nijverheidskaai, Anderlecht 1070</p>
                </div>
                <div class="flex items-center mt-2">
                    <a href="tel:+32499842525">
                        <img src="{{asset('icontel.png')}}" class="h-6">
                        <p class="ml-2 text-sm">
                            <a href="tel:+32499842525">+32 499 84 25 25
                        </p>
                </div>
                <div class="flex items-center mt-2">
                    <a href="mailto:info.va.ehb@gmail.com">
                        <img src="{{asset('messagelogo.png')}}" class="h-6">
                        <p class="ml-2 text-sm">
                            <a href="mailto:info.va.ehb@gmail.com"></a> info.va.ehb@gmail.com
                        </p>
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col items-center">
                <img class="h-5" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <p class="mt-2 text-sm">&#169 Erasmushogeschool</p>
            </div>

            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="flex space-x-2">
                    <a href="https://www.facebook.com/erasmushogeschool" class="text-white"><img
                            src="{{asset('iconfacebook.png')}}" class="h-6"></a>
                    <a href="https://www.linkedin.com/school/erasmushogeschool-brussel/" class="text-white"><img
                            src="{{asset('iconlinkedin.png')}}" class="h-6"></a>
                    <a href="https://www.youtube.com/user/ehbrussel" class="text-white"><img
                            src="{{asset('iconyoutube.png')}}" class="h-6"></a>
                </div>
                <div class="text-center mt-2">
                    <p class="text-sm mx-2 pl-4 pr-6">
                        Volg de EhB Voetbal App op de sociale media. Blijf op de hoogte van het laatste nieuws,
                        updates en spannende momenten van het EhB-voetbalseizoen.
                    </p>
                </div>

    </footer>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4V1JRM/CJhqFWE4/gs1SMgeu+2SL1OrS5t9jQQI4Im7oJ/rRlFxG/X+De4eL9ES"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js blades/myteam.blade.js') }}"></script>
</body>

</html>