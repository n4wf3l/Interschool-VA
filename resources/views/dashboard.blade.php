<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Browser Logo & Title -->
  <title>Dashboard — EhB Voetbal App</title>
  <link rel="icon" href="{{ asset('img blades/erasmuslogo2.png') }}" type="image/x-icon" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
    rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css blades/dashboard.blade.css') }}">
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
            <a href="{{ url('/dashboard') }}" class="text x1 text-teal-500" style="background-color: red;">DASHBOARD</a>
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
          @if (Route::has('login'))
          @auth
          <div class="relative rounded-full bg-green-700">
            <a href="#" @click="open = !open">
              <img class="h-7 inline" src="{{ asset('img blades/loginicon.png') }}" alt="Login Icon">
            </a>
            <div x-show="open" @click.away="open = false"
              class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py-0">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <p class="text-white bg-teal-500 text-center text-xs pb-2">{{ Auth::user()->name }} <img
                    onclick="window.location.href='{{ url('profile') }}'"
                    class="hover:bg-red-500 h-3 inline @auth rounded-full @endauth"
                    src="{{ asset('img blades/iconsettings.png') }}" alt="Settings Icon"></p>
                <a href="#" class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
                  onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</a>
              </form>
            </div>
          </div>
          @endauth
          @endif
        </div>
    </nav>
  </header>


  <main class=" flex-1 bg-cover w-full" style="background-image: url('img blades/goalcover3.jpg');">
    <div class="flex flex-row items-center ml-10 mt-20">
      <div class="relative flex items-end pb-12">
        <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
        <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
      </div>
      <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15 text-white">Welkom, {{ Auth::user()->name }} !
      </h2>
    </div>

    <div class="text-white bg-teal-500 p-2 w-full overflow-hidden">
      <div class="scrolling-text w-full">
        Welkom {{ Auth::user()->name }} op de EhB Voetbal App! Bekijk hieronder de opgenomen selectie voor dit seizoen.
        De beste doelpuntmaker
        is momenteel
        {{$topscorer->user->name}} met {{$topscorer->goals}} doelpunten !
      </div>
    </div>
    </div>
    <div class=" p-8 md:p-0 md:flex md:items-center md:justify-evenly mt-20">
      <div
        class="teams grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 text-center pb-20">
        @foreach($teams as $team)
        <div class="team-box border text-white">
          <h2 class="text-white bg-teal-500">{{ $team->Teamnaam }}</h2>
          <ul>
            @foreach($players[$team->TeamID] as $index => $player)
            <li class="ml-3 mr-3"> {{ $player->user->name }}
              @if($player->reserveplayer == 1)
              <span class="text-teal-500">R</span>
              @endif
              @if($player->teamleader == 1)
              <span class="text-blue-500">C</span>
              @endif
            </li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>
      <div
        class="topscorer border-4 border-red-500 rounded-lg shadow-md bg-gray-100 md:mx-auto md:mr-0 md:ml-0 md:mb-8 mr-40 ml-40">
        <h2 class="text-2xl font-bold mb-4 text-black p-2">Topscorer</h2>
        <div class="flex items-center">
          <img src="{{ asset('img blades/topscorericon.png') }}" alt="Description de l'image"
            class="h-10 w-10 rounded-full">
          <h3 class="text-lg font-medium md:mr-2">{{ $topscorer->user->name }}</h3>
        </div>
        <div class="flex flex-col md:flex-row">
          <p class="ml-2 md:pt-8 mb-2 md:mb-0">Goals:</p>
          <p class="text-8xl ml-6">{{ $topscorer->goals }}</p>
        </div>
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
            Volg de EhB Voetbal App op de sociale media. Blijf op de hoogte van het laatste nieuws, updates
            en spannende momenten van het EhB-voetbalseizoen.
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
  <script src="{{ asset('js blades/dashboard.blade.js') }}"></script>
</body>

</html>