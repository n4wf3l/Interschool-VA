<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Browser Logo & Title -->
    <title>MyTEAM — EhB Voetbal App</title>
    <link rel="icon" href="{{ asset('erasmuslogo2.png') }}" type="image/x-icon" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css blades/myadmin.css') }}">
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
                        <a href="{{ url('/myteam') }}" class="text x1 text-teal-500"
                            style="background-color: red;">MyTEAM</a>
                    </li>
                    @endif
                    @if(auth()->check() && (auth()->user()->admin === 1))
                    <p class="hidden md:inline">|</p>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/admins') }}" class="text x1 text-teal-500"
                            style="background-color: red;">MyADMIN</a>
                    </li>
                    @endif
                </ul>
                <!--Login list icon-->

                <div x-data="{ open: false }"
                    class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10 transition-transform transform-gpu hover:scale-110">
                    @if (Route::has('login'))
                    @auth
                    <div class="relative rounded-full bg-green-700">
                        <a href="#" @click="open = !open">
                            <img class="h-7 inline" src="{{ asset('loginicon.png') }}" alt="Login Icon">
                        </a>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py-0">
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
                        </div>
                    </div>
                    @endauth
                    @endif
                </div>
        </nav>
    </header>

    <main>
        <div class="flex-1 flex-col w-full mt-5 bg-cover bg-center"
            style="background-image: url('headadminpage.jpg'); margin-top: 50px;">
            <div class="flex flex-row items-center ml-10 pb-10">
                <!-- Design 2 Vertical -->

                <div class="relative flex items-end pt-10">

                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
                </div>
                <!-- Titre -->
                <h1 class="text-7xl font-bold ml-5 duration-500 text-white pt-12">
                    MyADMIN - {{ Auth::user()->name }}
                </h1>
            </div>
        </div>
    </main>

    <main class="bg-cover bg-center" style="background-image: url('coveradmin.jpg'); background-attachment: fixed;">
        <div class="flex flex-col md:flex-row pt-10 pb-20" style="margin-top: -50px;">
            <div class="w-full md:w-1/3 mb-8 md:mb-0">
                <div class="md:ml-10 container mx-auto my-8 p-8 text-center border rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold mb-4 text-white">INGESCHREVEN TEAMS</h2>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border bg-teal-500 text-white">Teamnaam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td class="px-4 py-2 border text-white">{{ $team->Teamnaam }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('generate-schedule') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded transition duration-300 hover:bg-blue-700">Genereren</button>
                    </form>

                    @if (session('status'))
                    <div class="mt-4 alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('reset-tournament') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded transition duration-300 hover:bg-red-700"
                            onclick="return confirm('Are you sure you want to reset the tournament? This action cannot be undone.');">
                            Reset Toernooi
                        </button>
                    </form>
                </div>
            </div>


            <!-- Deuxième conteneur -->
            <div class="w-full md:w-1/3 mb-8 md:mb-0 mt-[-300px]">
                <div class="w-full h-screen flex items-center justify-center ml-3">
                    <div class="p-8 rounded-lg shadow-md text-white border rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-4">Bericht alle aanvoerders</h2>
                        <form action="{{ route('send-message') }}" method="POST" class="text-center">
                            @csrf
                            <label for="notif" class="block mb-2">Bericht</label>
                            <textarea id="notif" name="notif"
                                class="w-full px-4 py-2 mb-4 border rounded-md text-black"></textarea>
                            <button type="submit"
                                class="bg-red-500 text-white px-6 py-2 rounded-md transition duration-300 hover:bg-red-700">
                                Sturen
                            </button>
                        </form>

                        @if(session('success'))
                        <div class="mt-4">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Troisième conteneur -->
            <div
                class="w-full md:w-1/3 mb-3 md:mb-0 p-8 rounded-lg shadow-md text-white border rounded-lg shadow-lg mt-7 mr-10">
                <h2 class="text-2xl font-bold mb-4">Onopgeloste resultaten</h2>
                <p class="pb-3">De onderstaande teams hebben verschillende wedstrijduitslagen doorgegeven. Druk op de
                    meldingsknop om
                    automatisch een e-mail te sturen naar de betrokken teamcaptains, zodat ze de juiste score op hun
                    MyTeam-pagina kunnen doorgeven.</p>
                <p class="pb-3">C (Captain) : Aanvoerder</p>
                <table class="w-full table-auto mb-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Wedstrijd</th>
                            <th class="px-4 py-2 border">Team 1</th>
                            <th class="px-4 py-2 border">Team 2</th>
                            <th class="px-4 py-2 border">Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                        <tr>
                            <td class="px-4 py-2 border">{{\Carbon\Carbon::parse($game->date)->translatedFormat('l, jS F
                                Y') }}</td>
                            <td class="px-4 py-2 border">{{ $game->team1_name }} <br> (C:{{ $game->team1_leader_name
                                }})</td>
                            <td class="px-4 py-2 border">{{ $game->team2_name }} <br> (C:{{ $game->team2_leader_name
                                }})</td>
                            <td class="px-4 py-2 border">
                                <form action="{{ route('notify-team-leaders', ['game' => $game->gameID]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-blue-700">
                                        Aanvoerders informeren
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(session('sent'))
                <div class="mt-4">{{ session('sent') }}</div>
                @endif
            </div>
        </div>
        </div>


        <div class="flex flex-row items-center ml-10">
            <!-- Design 2 Vertical -->

            <div class="relative flex items-end pb-12">

                <!-- Red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                <!-- Blue line, positioned to overlap the red line -->
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <!-- Titre -->
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15 text-white">Resultaten aanpassen</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 ml-20 mr-20">
            @foreach($games as $game)
            <form action="{{ route('admins.save-scores', ['game' => $game->gameID]) }}" method="POST"
                class="mb-4 border rounded-lg shadow-md p-4">

                @csrf

                <table class="w-full mb-4 border">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-2xl font-bold bg-red-500 text-center text-white py-2">Wijzig de
                                score aan :</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center font-semibold p-2 border text-white">Score {{ $game->team1_name }}:
                            </td>
                            <td class="text-center px-2 border"><input type="number" name="scoreTeam1"
                                    class="w-12 border rounded p-2" value="0" required></td>
                        </tr>
                        <tr>
                            <td class="text-center font-semibold p-2 border text-white">Score {{ $game->team2_name }}:
                            </td>
                            <td class="text-center px-2 border"><input type="number" name="scoreTeam2"
                                    class="w-12 border rounded p-2" value="0" required></td>
                        </tr>
                    </tbody>
                </table>

                <table class="w-full mb-4 text-center border">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-2xl font-bold bg-teal-500 text-white py-2">Wijzig de
                                doelpuntmakers
                                van {{ $game->team1_name }} :</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($playersWithGoals[$game->gameID]['team1'] as $player)
                        <tr>
                            <td class="font-semibold p-2 border text-white">{{ $player->user->name }}:</td>
                            <td class="text-center px-2 border"><input type="number"
                                    name="players_goals[{{ $player->playerID }}]" value="0"
                                    class="w-12 border rounded p-2" required></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="w-full mb-4 text-center border">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-2xl font-bold bg-teal-500 text-white py-2">Wijzig de
                                doelpuntmakers
                                van {{ $game->team2_name }} :</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($playersWithGoals[$game->gameID]['team2'] as $player)
                        <tr>
                            <td class="font-semibold p-2 border text-white">{{ $player->user->name }}:</td>
                            <td class="text-center px-2 border"><input type="number"
                                    name="players_goals[{{ $player->playerID }}]" value="0"
                                    class="w-12 border rounded p-2" required></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex items-center justify-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded transition duration-300 hover:bg-blue-700 mt-2">Bevestigen</button>
                </div>
            </form>
            @endforeach
        </div>

        @if(session('errorScore'))
        <div class="text-red-500">{{ session('errorScore') }}</div>
        @endif

        @if(session('successScore'))
        <div class="text-green-500">{{ session('successScore') }}</div>
        @endif

    </main>



    <footer>
        <div class="bg-red p-4 text-white flex flex-col md:flex-row justify-center items-center">
            <!-- Eerste kolom (data) -->
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

            <!-- Tweede kolom (logo erasmus) -->
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <img class="h-5" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <p class="mt-2 text-sm">&#169 Erasmushogeschool</p>
            </div>

            <!-- Derde kolom (social media)-->
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
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4V1JRM/CJhqFWE4/gs1SMgeu+2SL1OrS5t9jQQI4Im7oJ/rRlFxG/X+De4eL9ES"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js blades/myadmin.js') }}"></script>
</body>

</html>