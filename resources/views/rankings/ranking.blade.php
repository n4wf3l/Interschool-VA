<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Browser Logo & Title -->
  <title>Ranking — EhB Voetbal App</title>
  <link rel="icon" href="{{ asset('img blades/erasmuslogo2.png') }}" type="image/x-icon" />
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
        <img class="h-10 inline" src="{{ asset('img blades/erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
        <span class="text-3xl cursor-pointer mx-10 mt-2 md:hidden block" onclick="toggleMenu()">
          <ion-icon name="menu" id="menuIcon"></ion-icon>
        </span>

        <!--Navigation list -->
        <ul
          class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden"
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
            <a href="{{ url('/rankings') }}" class="text x1 text-teal-500" style="background-color: red;">RANKING</a>
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
                src="{{ asset('img blades/loginicon.png') }}" alt="Login Icon">
            </a>
            <div x-show="open" @click.away="open = false"
              class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py-0">
              @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <p class="text-white bg-teal-500 text-center text-xs pb-2">{{ Auth::user()->name }} <img
                    onclick="window.location.href='{{ url('profile') }}'"
                    class="hover:bg-red-500 h-3 inline @auth rounded-full @endauth"
                    src="{{ asset('img blades/iconsettings.png') }}" alt="Settings Icon"></p>
                <a href="#" class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
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

  <main class="bg-yellow-500 flex-1 pt-5 md:p-8 items-center mt-0 md:mt-50">
    <div class="bg-gray-100 p-8 md:p-0 md:flex md:items-center md:justify-evenly">

      <div class="mx-auto pl-10 text-center">
        <div class="flex flex-row items-center">
          <div class="relative flex items-end pb-20">
            <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
            <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
          </div>
          <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5">RANKING</h2>
        </div>
        <p
          class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
          Ontdek nu de actuele ranglijst van de EhB Voetbal App! Met ons
          geavanceerde Puntensysteem worden studententeams van alle campussen van Erasmushogeschool Brussel beoordeeld
          op basis van hun prestaties in verschillende wedstrijden.
          Dit zorgt voor een nauwkeurige weergave van de prestaties van elk team gedurende het seizoen <span
            id="jaartal"></span>.
          Mis niets van de actie en blijf op de hoogte van welk team de koploper is in EhB voetbal excellence!</p>

        <p
          class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
          Als echte sportliefhebber wil je altijd op de hoogte zijn
          van de
          laatste
          ontwikkelingen.
          Daarom wordt onze Standings-functie automatisch bijgewerkt, waardoor je in realtime de huidige ranglijst van
          studententeams kunt bekijken op basis van de gedurende het seizoen behaalde punten.
          Of je nu thuis bent, onderweg of op het veld, je hebt altijd een actueel overzicht van de competitie binnen
          handbereik.
          Bovendien houden we niet alleen rekening met teamprestaties, maar handhaven we ook een dynamische ranglijst
          van Top Scorers en Key Passers, waar individuele prestaties worden benadrukt en buitengewone bijdragen aan het
          team worden erkend.</p>
        <p
          class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
          Bent u competitief? Schrijf het verhaal: Vind door op de onderstaande knop te klikken, de
          archieven van voorgaande seizoenen: De ranglijst, de beste prestaties van de 'GOAT'-clubs en de topscorers van
          voorgaande jaren, en probeer de records te overtreffen!</p>
        <button type="submit" onclick="window.location.href='{{ url('/rankings/archived') }}'"
          class="my-auto sm:ml-40mx-auto bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-yellow-500">
          GESCHIEDENIS
        </button>


      </div>

      <div class="mx-auto pl-10">
        <div class="hidden md:flex md:flex-row md:items-center md:pr-20">
          <!-- Design 2 Vertical -->
          <div class="relative flex items-end pb-12">
            <!-- Red line -->
            <div class="-mr-1.5 mt-60 h-[500px] w-4 bg-red-500"></div>
            <!-- Blue line, positioned to overlap the red line -->
            <div class="-mr-1.5 mt-60 h-[500px] w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <main class="bg-red-500 items-center justify-center pt-5">
    <div class="bg-white md:p-0 md:flex md:items-center md:justify-evenly w-full bg-cover min-h-screen"
      style="background-image: url('img blades/futsalcover.jpg'); height: 800px;">
      <div class="mx-auto  bg-gray-100 rounded-lg p-4">
        <h1 class="text-center mb-4 text-black">Competitie</h1>
        <table class="w-full border border-gray-300 text-white">
          <thead class="bg-teal-500">
            <tr>
              <th class="p-2">Positie</th>
              <th class="p-2">Team</th>
              <th class="p-2">Points</th>
            </tr>
          </thead>
          <tbody class="text-black">
            @foreach ($rankedTeams as $index => $team)
            <tr>
              <td class="p-2">{{ $index + 1 }}</td>
              <td class="p-2">{{ $team->Teamnaam }}</td>
              <td class="p-2">{{ $team->points }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mx-auto w-34 bg-gray-100 rounded-lg p-4">
        <h1 class="text-center mb-4 text-black">Topscorers</h1>
        <table class="w-full border border-gray-300 text-white">
          <thead class="bg-red-500">
            <tr>
              <th class="p-2">Rank</th>
              <th class="p-2">Player</th>
              <th class="p-2">Goals</th>
            </tr>
          </thead>
          <tbody class="text-black">
            @foreach ($rankedPlayers as $index => $player)
            @if($player->goals === 0)
            @break
            @endif
            <tr>
              <td class="p-2">{{ $index + 1 }}</td>
              <td class="p-2">{{ $player->user->name }}</td>
              <td class="p-2">{{ $player->goals }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </main>

  <main class="bg-white flex-1 pt-5 md:mt-40 mt-32">
    <div class="mx-auto pl-10">
      <div class="flex flex-row items-center">
        <div class="relative flex items-end">
          <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
          <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
        </div>
        <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5">ZIE OOK</h2>
      </div>
      <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 mt-4 pl-10 pb-10">
        <button type="submit" onclick="window.location.href='{{ url('calendars') }}'"
          class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
          KALENDER
        </button>
        <button type="submit" onclick="window.location.href='{{ route('registerteams') }}'"
          class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
          INSCHRIJVING
        </button>
      </div>
    </div>
  </main>



  <footer>
    <div class="bg-red p-4 text-white flex flex-col md:flex-row justify-center items-center">
      <!-- Eerste kolom (data) -->
      <div class="w-full md:w-1/2 flex flex-col items-center mb-4 md:mb-0">
        <div class="flex items-center">
          <a href="{{ url('about') }}#onze-campussen">
            <img src="{{asset('img blades/positionicon.png')}}" class="h-6">
          </a>
          <p class="ml-2 text-sm">Nijverheidskaai, Anderlecht 1070</p>
        </div>
        <div class="flex items-center mt-2">
          <a href="tel:+32499842525">
            <img src="{{asset('img blades/icontel.png')}}" class="h-6">
            <p class="ml-2 text-sm">
              <a href="tel:+32499842525">+32 499 84 25 25
            </p>
        </div>
        <div class="flex items-center mt-2">
          <a href="mailto:info.va.ehb@gmail.com">
            <img src="{{asset('img blades/messagelogo.png')}}" class="h-6">
            <p class="ml-2 text-sm">
              <a href="mailto:info.va.ehb@gmail.com"></a> info.va.ehb@gmail.com
            </p>
        </div>
      </div>

      <!-- Tweede kolom (logo erasmus) -->
      <div class="w-full md:w-1/2 flex flex-col items-center">
        <img class="h-5" src="{{ asset('img blades/erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
        <p class="mt-2 text-sm">&#169 Erasmushogeschool</p>
      </div>

      <!-- Derde kolom (social media)-->
      <div class="w-full md:w-1/2 flex flex-col items-center">
        <div class="flex space-x-2">
          <a href="https://www.facebook.com/erasmushogeschool" class="text-white"><img
              src="{{asset('img blades/iconfacebook.png')}}" class="h-6"></a>
          <a href="https://www.linkedin.com/school/erasmushogeschool-brussel/" class="text-white"><img
              src="{{asset('img blades/iconlinkedin.png')}}" class="h-6"></a>
          <a href="https://www.youtube.com/user/ehbrussel" class="text-white"><img
              src="{{asset('img blades/iconyoutube.png')}}" class="h-6"></a>
        </div>
        <div class="text-center mt-2">
          <p class="text-sm mx-2 pl-4 pr-6">
            Volg de EhB Voetbal App op de sociale media. Blijf op de hoogte van het laatste nieuws,
            updates en spannende momenten van het EhB-voetbalseizoen.
          </p>
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
  <script src="{{ asset('js blades/ranking.blade.js') }}"></script>
</body>

</html>