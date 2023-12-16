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
    <link rel="stylesheet" href="{{ asset('css blades/welcome.blade.css') }}">
  </head>

  <body class="flex flex-col h-screen">

  <header>
      <nav class="p-2 bg-red shadow md:flex md:items-center md:justify-between fixed w-full top-0 z-50" style="background-color: red;">
        <div class="flex items-center justify-between">
         <!--Erasmus logo -->
          <img class="h-10 inline" src="{{ asset('erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                    <!--Hamburger menu for responsive  -->
                    <span class="text-3xl cursor-pointer mx-10 mt-2 md:hidden block" onclick="toggleMenu()">
            <ion-icon name="menu" id="menuIcon"></ion-icon>
          </span>

          <!--Navigation list -->
          <ul class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden" style="background-color: red;">
            <li class="mx-4 my-0 md:my-0 bg-red">
              <a href="#" class="text x1 text-teal-500" style="background-color: red;">HOME</a>
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

    <main class="bg-white flex-1">
      <img src="{{asset('backgroundimage.png')}}" alt="" srcset="" class="w-full">
      <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
    <li class="flex md:w-full items-center text-red-500 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="hover:text-teal-500 duration-500 flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            Home <span class="hidden sm:inline-flex sm:ms-2">inschrijving</span>
        </span>
    </li>
    <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="hover:text-teal-500 duration-500 flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <span class="me-2">2</span>
            Vul <span class="hidden sm:inline-flex sm:ms-2">formulier</span>
        </span>
    </li>
    <li class="flex items-center hover:text-teal-500 duration-500">
    <span class="me-2">3</span>
            Kies <span class="hidden sm:inline-flex sm:ms-2">team</span>
    </li>
</ol>
      <!-- Container -->
      <div class="bg-gray-100 p-8 md:p-0 md:flex md:items-center md:justify-evenly p-10">
        <!-- Flex Img and Data -->
        <div class="md:w-2/5 mx-auto md:mx-0">
          <!-- Img Blue -->
          <img src="{{ asset('balimg.jpg') }}" alt="Votre Image" class="w-30 h-70">
        </div>
        <div class="md:w-2/5 md:ml-8 mx-auto md:mx-0 flex flex-col md:items-start">
          <div class="flex flex-row">
            <!-- Design 2 Vertical -->
            <div class="relative flex items-end pb-12">
              <!-- Red line -->
              <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
              <!-- Blue line, positioned to overlap the red line -->
              <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem; /* 3px */"></div>
            </div>
            <!-- Titre -->
            <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">SCHRIJF JE IN!</h2>
          </div>
          <!-- Paragraphe -->
          <p class="text-2xl text-base mb-6 duration-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum efficitur sapien, id laoreet risus fringilla nec. Sed euismod felis eu libero varius, id semper dui fermentum. Ut ac lorem at ligula maximus rhoncus eget ac urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit."</p>
          <!-- Bouton -->
          <button type="submit" onclick="window.location.href='{{ route('register') }}'" class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-500"> INSCHRIJVING </button>
        </div>
    </main>
    <main class="bg-white flex-1 pb-20">
      <!-- white spacing : sectie 2 - next feature? -->
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
    <script src="{{ asset('js blades/welcome.blade.js') }}"></script>
  </body>
</html>