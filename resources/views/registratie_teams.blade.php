<x-auth-session-status class="mb-4" :status="session('status')" />
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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap" rel="stylesheet">
   <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('registratie_teams.blade.css') }}">
  </head>

  <body class="flex flex-col h-screen">
    <header>
      <nav class="p-2 bg-red shadow md:flex md:items-center md:justify-between fixed w-full top-0 z-50" style="background-color: red;">
        <div class="flex items-center justify-between">
         <!--Erasmus logo -->
          <img class="h-10 inline" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
          <!--Navigation list -->
          <ul class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden" style="background-color: red;">
            <li class="mx-4 my-0 md:my-0 bg-red">
              <a href="{{ url('/') }}" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">HOME</a>
            </li>
            <li class="mx-4 my-0 md:my-0 bg-red">
              <a href="#" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">ABOUT</a>
            </li>
            <li class="mx-4 my-0 md:my-0 bg-red">
              <a href="#" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">CALENDAR</a>
            </li>
            <li class="mx-4 my-0 md:my-0 bg-red">
              <a href="#" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">RANKING</a>
            </li>
            <li class="mx-4 my-0 md:my-0 bg-red">
              <a href="{{ url('/contacts') }}" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">CONTACT</a>
            </li>
          </ul>
          <!--Hamburger menu for responsive  -->
          <span class="text-3xl cursor-pointer mx-2 md:hidden block" onclick="toggleMenu()">
            <ion-icon name="menu" id="menuIcon"></ion-icon>
          </span>
           <!--Login list icon-->
          <div x-data="{ open: false }" class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10 transition-transform transform-gpu hover:scale-110"> @if (Route::has('login')) @auth <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> @else <div class="relative">
              <a href="#" @click="open = !open">
                <img class="h-7 inline" src="{{ asset('loginicon.png') }}" alt="Login Icon">
              </a>
              <div x-show="open" @click.away="open = false" class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py=0">
                <a href="{{ route('login') }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500">Login</a> @if (Route::has('register')) <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-400">Register</a> @endif
              </div>
            </div> @endauth @endif </div>
      </nav>
    </header>


    <main class="bg-white flex-1 pt-20">
    <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
    <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <span class="me-2">1</span>
            Home <span class="hidden sm:inline-flex sm:ms-2">inschrijving</span>
        </span>
    </li>

    <li class="flex md:w-full items-center text-gray-500 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700 hover:text-teal-500 duration-500">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
        <span class="me-2 text-gray-500">2</span>
            Vul <span class="hidden sm:inline-flex sm:ms-2">formulier</span>
        </span>
    </li>

    <li class="flex items-center text-red-500">
        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
        Kies <span class="hidden sm:inline-flex sm:ms-2">team</span>
    </li>
</ol>

    
    <!-- Container -->
    <div class="bg-gray-100 p-8 md:p-0 md:flex md:items-center md:justify-evenly">
        <!-- Flex Img and Data -->
        <div class="mx-auto md:mx-0 items-center ">
            <!-- Img Blue -->
        </div>
        <div class="mx-auto"> <!-- Ajoutez la classe mx-auto pour centrer horizontalement -->
            <div class="flex flex-row items-center">
                <!-- Design 2 Vertical -->
                <div class="relative flex items-end pb-12">
                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
                </div>
                <!-- Titre -->
                <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">KIES EEN TEAM</h2>
            </div>


            <form action="{{ route('register', ['TeamID' => 'selectedTeamID']) }}" method="get">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 text-center">
        @foreach($playersByTeam as $teamID => $players)
            <div class="team-box border">
                <h2 class="text-white bg-red-500">Team {{ $teamID }}</h2>
                <div class="player-box">
                    @foreach($players as $player)
                        <div class="player">
                            {{ $player->user->name }} {{ $player->user->surname }}
                            @if($player->reserveplayer == 1)
                                <span class="text-teal-500">R</span>
                            @endif
                            @if($player->teamleader == 1)
                                <span class="text-blue-500">C</span>
                            @endif
                        </div>
                    @endforeach
                </div>
                @if(count($players) < 7)
                    <input type="radio" name="TeamID" value="{{ $teamID }}">
                @endif
                @if(count($players) === 7)
                    <p class="text-red-500">Vol</p>
                @endif
            </div>
        @endforeach
    </div>
    <div class="text-center pt-5">
    <span class="text-blue-500">C</span> (Captain) = Aanvoerder
    <br>
    <span class="text-teal-500">R</span> = Reservespeler
</div>
<div class="flex justify-center text-right mt-6 mb-10">
                    <button type="submit" onclick="setTeamID()" class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">VERZENDEN</button>
                </div>
</form>


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
            <a href="#" class="text-white">
              <img src="{{asset('iconfacebook.png')}}" class="h-6">
            </a>
            <a href="#" class="text-white">
              <img src="{{asset('iconlinkedin.png')}}" class="h-6">
            </a>
            <a href="#" class="text-white">
              <img src="{{asset('iconyoutube.png')}}" class="h-6">
            </a>
          </div>
          <div class="text-center mt-2">
            <p class="text-sm mx-2 pl-4 pr-6"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum efficitur sapien, id laoreet risus fringilla nec. </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b4V1JRM/CJhqFWE4/gs1SMgeu+2SL1OrS5t9jQQI4Im7oJ/rRlFxG/X+De4eL9ES" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('welcome.blade.js') }}"></script>
  </body>
</html>
<script>
    function setTeamID() {
        // Verwijder alle oude sessiegegevens
        sessionStorage.clear();

        // Voeg de nieuwe TeamID toe aan de sessie
        var selectedTeamID = document.querySelector('input[name="TeamID"]:checked').value;
        console.log('Geselecteerde TeamID:', selectedTeamID);
        sessionStorage.setItem('TeamID', selectedTeamID);

        // Log de TeamID die in de sessie is opgeslagen
        var storedTeamID = sessionStorage.getItem('TeamID');
        console.log('TeamID in sessie:', storedTeamID);
    }
</script>
    </body>
</html>
