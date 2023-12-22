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
  <link rel="stylesheet" href="{{ asset('css blades/myteam.blade.css') }}">
</head>

<body class="flex flex-col h-screen">
  <header>
    <nav class="p-2 bg-red shadow md:flex md:items-center md:justify-between fixed w-full top-0 z-50"
      style="background-color: red;">
      <div class="flex items-center justify-between">
        <img class="h-10 inline" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
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
            <a href="{{ url('/myteam') }}" class="text x1 text-teal-500" style="background-color: red;">MyTEAM</a>
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

  <main class="flex-1 flex-col  w-full mt-10 bg-color bg-center" style="background-image: url('composition.jpg');">
    <div class="flex flex-row items-center ml-10 mt-10">

      <div class="relative flex items-end pb-12">

        <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
        <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
      </div>
      <h2 class="text-7xl font-bold mb-4 duration-500 pl-5 pb-15 text-white">
        MyTEAM - {!! $playerWithGoals->first()->Team->Teamnaam !!}
      </h2>

      @if($isTeamLeader)
      <div x-data="{ isOpen: false }">
        <img @click="isOpen = true"
          class="ml-3 hover:bg-teal-500 h-10 inline @auth transition duration-500 rounded-full @endauth"
          src="{{ asset('whiteiconsettings.png') }}" alt="Settings Icon">

        <div x-show="isOpen" @click.away="isOpen = false"
          class="fixed inset-0 bg-black bg-opacity-25 flex items-center justify-center">
          <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('updateTeamName') }}">
              @csrf
              <label for="newTeamName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nieuwe
                teamnaam:</label>
              <div class="flex flex-col items-center space-y-2">
                <input type="text" id="newTeamName" name="newTeamName"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required>
                <div class="flex space-x-2">
                  <button type="button" @click="isOpen = false"
                    class="bg-red-500 text-1xl text-white px-2 py-1 rounded transition duration-500 hover:bg-teal-500">Sluiten</button>
                  <button type="submit"
                    class="bg-teal-500 text-1xl text-white px-2 py-1 rounded transition duration-500 hover:bg-red-500">Opslaan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
      </div>
    </div>
  </main>

  <div class="bg-red-500 h-3 w-full pt-3 pb-3"></div>
  <div class="bg-teal-500 h-3 w-full pt-3 pb-3"></div>
  <div class="flex flex-col md:flex-row">


    <main class="w-full md:w-1/2" x-data="{ openForm: null, currentFormNumber: 0 }">
      <div class="flex flex-col items-center justify-center md:p-0 mt-2">
        <h1 class="text-5xl font-bold mb-4 duration-500 mt-10">Aankomende wedstrijden</h1>
        <div class="text-left pt-5 pb-5">
          <span class="text-red-500">TS (Tijdelijke score)</span> = De score die je ingeeft moet gelijk zijn aan
          die van de tegenstander
          <br>
          <span class="text-blue-500">C (Captain)</span> = Aanvoerder
          <br>
          <span class="text-teal-500">R</span> = Reservespeler
        </div>

        @foreach($teamGames as $key => $game)
        <div x-show="openForm === '{{$game->gameID}}'" class="text-center mb-4 flex flex-col border border-red-500">
          <button @click="openForm = null"
            class="bg-red-500 text-1xl text-white mb-3 px-2 py-1 rounded transition duration-500 hover:bg-teal-500">
            Sluiten
          </button>
          <p>WEDSTRIJDDATUM : {{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}</p>
          {{ $game->team1->Teamnaam }} VS {{ $game->team2->Teamnaam }} | Score: {{$game->scoreTeam1}} -
          {{$game->scoreTeam2}}</p>

          @if($isTeamLeader && $game->scoreTeam1 === null && $game->scoreTeam2 === null)
          @php
          $disableInput = request()->cookie('scoreEntered');
          @endphp

          <form class="flex flex-row" method="POST"
            action="{{ route('saveTemporaryScores', ['gameId' => $game->gameID]) }}">
            @csrf
            <div>
              <h2 class="text-2xl font-bold mb-4 duration-500 bg-red-500 text-white pl-2 pr-2 ">Geef de
                score in : </h2>

              <label for="tijdelijkScoreTeam1"><span class="text-red-500 ml-2">TS</span> Tegenstander:</label>
              <input class="w-7 bg-gray-200" type="number" id="tijdelijkScoreTeam1" name="tijdelijkScoreTeam1" value="0"
                min="0" required {{ $disableInput ? 'disabled' : '' }}>

              <label for="tijdelijkScoreTeam2"><span class="text-red-500">TS</span> {!!
                $playerWithGoals->first()->Team->Teamnaam !!}:</label>
              <input class="w-7 bg-gray-200" type="number" id="tijdelijkScoreTeam2" name="tijdelijkScoreTeam2" value="0"
                min="0" required {{ $disableInput ? 'disabled' : '' }}>

            </div>
            <div class="text-right mt-auto mr-3">
              <h2 class="text-2xl font-bold mb-4 duration-500  bg-teal-500 text-white pl-2 pr-2">Geef de doelpuntmakers
                in
                :
              </h2>
              @foreach($playerWithGoals as $player)

              <div class="text-right">
                <p class="pb-2">
                  {{ $player->user->name }} {{ $player->user->surname }}
                  @if($player->teamleader == 1)
                  <span class="text-blue-500">C</span>
                  @endif
                  @if($player->reserveplayer == 1)
                  <span class="text-teal-500">R</span>
                  @endif
                  :
                  @if($isTeamLeader)
                  <input class="w-7 bg-gray-200" type="number" name="player_goals[{{ $player->playerID }}]" value="0"
                    min="0">
                  @else
                  {{ $player->goals }}
                  @endif
                </p>
              </div>
              @endforeach
              <button
                class="mr-1 bg-teal-500 text-1xl text-white mb-3 px-2 py-1 rounded transition duration-500 hover:bg-red-500"
                type="submit" {{ $disableInput ? 'disabled' : '' }}>Bevestig TS</button>
            </div>
          </form>
          @endif
        </div>
        <button
          @click="openForm = openForm === '{{$game->gameID}}' ? null :'{{$game->gameID}}'; currentFormNumber = {{$key + 1}}"
          class="bg-teal-500 text-1xl text-white mb-3 px-2 py-1 rounded transition duration-500 hover:bg-red-500">
          Toon wedstrijd {{ $key + 1 }}
        </button>
        @endforeach
      </div>
    </main>


    <main class=" md:w-1/2 flex flex-col items-center justify-center h-screen"
      style="background-image: url('goalcover3.jpg');">
      <p class="text-white">Welkom, {{ Auth::user()->name }}!</p>
      <p class="text-white"> Wijzig <a class="hover:text-teal-500 transition duration-500"
          href="{{ url('/profile') }}">hier</a> jouw
        profiel </p>
      <p class="text-white">Indien er een technisch probleem is, neem hieronder contact op met de admin.</p>
      <button type="submit" onclick="window.location.href='{{ url('contacts') }}'"
        class="bg-red-500 text-sm text-white px-10  rounded transition duration-500 hover:bg-white hover:text-red-500">
        ADMIN </button>

      <h2 class="text-5xl font-bold mb-4 duration-500 mt-10 text-white">{!! $playerWithGoals->first()->Team->Teamnaam
        !!}</h2>
      <table class="border-collapse border border-gray-300 bg-white shadow-md">
        <thead>
          <tr>
            <th class="p-3 border-b bg-teal-500 text-white">Naam</th>
            <th class="p-3 border-b bg-teal-500 text-white">Voornaam</th>
            <th class="p-3 border-b bg-teal-500 text-white">Rol</th>
            <th class="p-3 border-b bg-teal-500 text-white">Aant. DP</th>
          </tr>
        </thead>
        <tbody>
          @foreach($playerWithGoals as $player)
          <tr class="hover:bg-gray-50">
            <td class="p-3 border-b">{{ $player->user->name }}</td>
            <td class="p-3 border-b">{{ $player->user->surname }}</td>
            <td class="p-3 border-b">
              @if($player->teamleader == 1)
              <span class="text-blue-500">C</span>
              @endif
              @if($player->reserveplayer == 1)
              <span class="text-teal-500">R</span>
              @endif
            </td>
            <td class="p-3 border-b text-center">{{ $player->goals }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="flex flex-col items-center mt-8 space-y-4">
        <button type="submit" onclick="window.location.href='{{ url('calendars') }}'"
          class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
          KALENDER</button>
        <button type="submit" onclick="window.location.href='{{ url('rankings') }}'"
          class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
          RANKING </button>
      </div>

    </main>
  </div>

  @if(session('showAlert'))
  <script>
    alert("{{ session('Alert!') }}");
  </script>
  @endif
  </div>

  </main>

  <footer>
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
          <a href="https://www.youtube.com/user/ehbrussel" class="text-white"><img src="{{asset('iconyoutube.png')}}"
              class="h-6"></a>
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