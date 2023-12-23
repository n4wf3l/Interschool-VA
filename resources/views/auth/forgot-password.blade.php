<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Browser Logo & Title -->
  <title>Wachtwoord vergeten? — EhB Voetbal App</title>
  <link rel="icon" href="{{ asset('img blades/erasmuslogo2.png') }}" type="image/x-icon" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
    rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css blades/forgot.password.css') }}">
</head>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Browser Logo & Title -->
  <title>Wachtwoord vergeten — EhB Voetbal App</title>
  <link rel="icon" href="{{ asset('img blades/erasmuslogo2.png') }}" type="image/x-icon" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
    rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css blades/forgot.password.css') }}">
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
            <a href="#" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">ABOUT</a>
          </li>
          <li class="mx-4 my-0 md:my-0 bg-red">
            <a href="#" class="text x1 hover:text-teal-500 duration-500" style="background-color: red;">CALENDAR</a>
          </li>
          <li class="mx-4 my-0 md:my-0 bg-red">
            <a href="{{ url('/rankings') }}" class="text x1 hover:text-teal-500 duration-500"
              style="background-color: red;">RANKING</a>
          </li>
          <li class="mx-4 my-0 md:my-0 bg-red">
            <a href="{{ url('/contacts') }}" class="text x1 hover:text-teal-500 duration-500"
              style="background-color: red;">CONTACT</a>
          </li>
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

  <main class="bg-white flex-1">
    <img src="{{asset('img blades/backgroundimage.png')}}" alt="" srcset="" class="w-full">
    <div class="bg-gray-100 p-8 md:p-0 md:flex md:items-start md:justify-evenly">
      <div class="md:w-2/5 mx-auto md:mx-0">
        <img src="{{ asset('img blades/multiimg.png') }}" alt="Votre Image" class="w-30 h-70">
      </div>
      <div class="md:w-2/5 md:ml-8 mx-auto md:mx-0 flex flex-col md:items-start">
        <div class="flex flex-row">
          <div class="relative flex items-end pb-12">
            <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
            <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem; /* 3px */"></div>
          </div>
          <h2 class="text-4xl md:text-4xl lg:text-8xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">WACHTWOORD VERGETEN?
          </h2>


        </div>
        <div class="mb-4 text-sm text-gray-600">
          {{ __('Ben je je wachtwoord vergeten? Geen probleem. Laat ons gewoon weten welk e-mailadres je hebt gebruikt,
          en we sturen je een link voor het opnieuw instellen van het wachtwoord. Hiermee kun je een nieuw wachtwoord
          kiezen.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
          @csrf

          <!-- Email Address -->
          <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
              autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-primary-button>
              {{ __('E-mail Wachtwoordherstel Link') }}
            </x-primary-button>
          </div>
        </form>
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
    <script src="{{ asset('js blades/forgot.password.js') }}"></script>
</body>

</html>
