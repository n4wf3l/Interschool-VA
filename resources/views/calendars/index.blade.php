<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Browser Logo & Title -->
  <title>Kalender — EhB Voetbal App</title>
  <link rel="icon" href="{{ asset('erasmuslogo2.png') }}" type="image/x-icon" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
    rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css blades/login.blade.css') }}">
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
        <ul
          class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden"
          style="background-color: red;">
          <li class="mx-4 my-0 md:my-0 bg-red">
            <a href="{{ url('/') }}" class="text x1 hover:text-teal-500 duration-500"
              style="background-color: red;">HOME</a>
          </li>
          <li class="mx-4 my-0 md:my-0 bg-red">
            <a href="{{ url('/about') }}" class="text x1 hover:text-teal-500 duration-500"
              style="background-color: red;">ABOUT</a>
          </li>
          <li class="mx-4 my-0 md:my-0 bg-red">
            <a href="{{ url('/calendars') }}" class="text x1 text-teal-500" style="background-color: red;">CALENDAR</a>
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
              <img class="h-7 inline @auth bg-green-700 rounded-full @endauth" src="{{ asset('loginicon.png') }}"
                alt="Login Icon">
            </a>
            <div x-show="open" @click.away="open = false"
              class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py-0">
              @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <p class="text-white bg-teal-500 text-center text-xs">{{ Auth::user()->name }}</p>
                <a href="#" class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
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

  <main class="bg-white flex-1">
    <div class="bg-gray-100 p-8 md:p-0 md:flex md:items-center md:justify-evenly">

      <div class="mx-auto pl-10">
        <div class="flex flex-row items-center">
          <div class="relative flex items-end pb-20">
            <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
            <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
          </div>
          <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5">SEIZOENSKALENDER</h2>
        </div>
        <p class="pl-20 text-2xl text-center ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et diam vel
          ligula malesuada pellentesque. Curabitur auctor, risus quis tempor tincidunt, tortor mi convallis nulla,
          ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id aliquet euismod. In hac habitasse platea
          dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo dui fermentum at. Lorem ipsum dolor sit
          amet, consectetur adipiscing elit. Sed et diam vel ligula malesuada pellentesque. Curabitur auctor, risus quis
          tempor tincidunt, tortor mi convallis nulla, ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id
          aliquet euismod. In hac habitasse platea dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo
          dui fermentum at.</p>
        <p class="pl-20 mt-10 text-2xl pb-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et diam vel
          ligula malesuada pellentesque. Curabitur auctor, risus quis tempor tincidunt, tortor mi convallis nulla,
          ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id aliquet euismod. In hac habitasse platea
          dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo dui fermentum at. Lorem ipsum dolor sit
          amet, consectetur adipiscing elit. Sed et diam vel ligula malesuada pellentesque. Curabitur auctor, risus quis
          tempor tincidunt, tortor mi convallis nulla, ut vestibulum purus massa ac orci. Vestibulum dignissim nunc id
          aliquet euismod. In hac habitasse platea dictumst. Nulla facilisi. Integer auctor consequat libero, ac commodo
          dui fermentum at.</p>
      </div>

      <div class="flex flex-row items-center pr-20">
        <!-- Design 2 Vertical -->
        <div class="relative flex items-end pb-12">
          <!-- Red line -->
          <div class="-mr-1.5 mt-60 h-[500px] w-4 bg-red-500"></div>
          <!-- Blue line, positioned to overlap the red line -->
          <div class="-mr-1.5 mt-60 h-[500px] w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
        </div>

      </div>
  </main>

  <main class="pt-5 w-full bg-cover" style="background-image: url('futsalcover.jpg');">
    <h1 class="flex items-center justify-center text-center mb-4 text-white text-5xl">Overzicht kalender</h1>

    <div class="mx-auto w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-teal-300 rounded-lg p-4 flex items-center justify-center">
      <table class="w-full md:w-full lg:w-full xl:w-full border border-solid border-gray-300 text-black p-2">
        <!-- Ajustez la classe de marge ici -->
        <thead>
          <tr>
            <th class="text-center bg-red-500 mb-4 text-white border border-solid">Datum en tijdstip</th>
            <th class="text-center bg-teal-500 mb-4 text-white border border-solid">HT</th>
            <th class="text-center bg-teal-500 mb-4 text-white border border-solid">AT</th>
            <th class="text-center bg-red-500 mb-4 text-white border border-solid">HT | Score | AT</th>
          </tr>
        </thead>
        <tbody>
          @foreach($games as $game)
          <tr>
            <td class="text-center bg-gray-300 text-black border border-solid">{{ $game->date }}</td>
            <td class="text-center bg-gray-300 text-black border border-solid">{{ $game->team1->Teamnaam }}</td>
            <td class="text-center bg-gray-300 text-black border border-solid">{{ $game->team2->Teamnaam }}</td>
            <td class="text-center bg-gray-300 text-black border border-solid">{{ $game->team1->Teamnaam }} | {{
              $game->scoreTeam1 }} - {{ $game->scoreTeam2 }} | {{ $game->team2->Teamnaam }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!--
    <form action="{{ route('generate-schedule') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Generate Schedule</button>
    </form>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif


    <form action="{{ route('reset-tournament') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to reset the tournament? This action cannot be undone.');">
            Reset Tournament
        </button>
    </form> -->

    </div>
  </main>

  <main class="bg-white flex-1 pt-5">

    <div class="mx-auto pl-10">
      <div class="flex flex-row items-center">
        <!-- Design 2 Vertical -->
        <div class="relative flex items-end pb-20">
          <!-- Red line -->
          <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
          <!-- Blue line, positioned to overlap the red line -->
          <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
        </div>

        <!-- Titre -->
        <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5">ZIE OOK</h2>
      </div>
      <div class="flex space-x-4 mt-6 pl-20 pb-10">
        <button type="submit" onclick="window.location.href='{{ url('rankings') }}'"
          class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
          RANKING</button>
        <button type="submit" onclick="window.location.href='{{ url('rankings') }}'"
          class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500">
          TOPSCORERS </button>
      </div>

    </div>
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
          <a href="https://www.youtube.com/user/ehbrussel" class="text-white"><img src="{{asset('iconyoutube.png')}}"
              class="h-6"></a>
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
  <script src="{{ asset('js blades/login.blade.js') }}"></script>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tournament Schedule</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
</head>