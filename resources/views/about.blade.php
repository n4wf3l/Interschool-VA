<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" >
<style>


</style>

</head>
<body>
    <div class="container mt-5">
        <main>

            <div class="flex flex-row items-center">
                <!-- Design 2 Vertical -->

                <div class="relative flex items-end pb-12">

                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
                </div>
                <!-- Titre -->
                <h2 class="text-5xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">About</h2>
            </div>
 <p>
            Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum efficitur sapien, id laoreet risus
            fringilla nec. Sed euismod felis eu libero varius, id semper dui fermentum. Ut ac lorem at ligula maximus rhoncus eget ac urna. Lorem ipsum dolor sit amet, consectetur  adipiscing elit.
            Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum

            Efficitur sapien, id laoreet risus fringilla nec. Sed euismod felis eu libero varius, id semper dui
            fermentum. Ut ac lorem at ligula maximus rhoncus eget ac urna. Ut ac lorem at ligula maximus rhoncus eget ac urna. Lorem ipsum dolor sit amet, consectetur  adipiscing elit.
            Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum
        </p>

    </main>
        <main>

            <div class="flex flex-row items-center">
                <!-- Design 2 Vertical -->

                <div class="relative flex items-end pb-12">

                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
                </div>
                <!-- Titre -->
                <h2 class="text-5xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">Regels</h2>
            </div>



            <p>Lorem ipsum dolor sit amet, consectetur  adipiscing elit. Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum efficitur sapien, id laoreet risus
                fringilla nec. Sed euismod felis eu libero varius, id semper dui fermentum. Ut ac lorem at ligula maximus rhoncus eget ac urna. Lorem ipsum dolor sit amet, consectetur  adipiscing elit.
                Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum

                Efficitur sapien, id laoreet risus fringilla nec. Sed euismod felis eu libero varius, id semper dui
                fermentum. Ut ac lorem at ligula maximus rhoncus eget ac urna. Ut ac lorem at ligula maximus rhoncus eget ac urna. Lorem ipsum dolor sit amet, consectetur  adipiscing elit.
                Quisque vehicula libero at quam tristique, ut volutpat metus hendrerit. Integer vestibulum </p>
        </main>

        <main class="flex flex-col md:flex-col items-center">

            <!-- Titre -->
            <div class="flex flex-row items-center">
                <!-- Design 2 Vertical -->

                <div class="relative flex items-end pb-12">

                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
                </div>
                <!-- Titre -->
                <h2 class="text-5xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">Onze campussen</h2>
            </div>

                    <!-- Image -->
                    <img src="{{asset('MicrosoftTeams-image.png')}}" alt="" class="w-30 h-30 md:ml-8 mb-4 md:mb-0">

                    <!-- Location and Address -->
                    <div class=" flex flex-col ">
                        <div class="flex items-center">
                            <img src="{{asset('positionicon.png')}}" class="h-7">
                            <p class="ml-2 text-sm">Nijverheidskaai, Anderlecht 1070</p>
                        </div>
                    </div>

        </main>



        {{--   <section class="mt-4">
                <h2>Onze Campussen</h2>
                <div class="relative flex items-end pb-12">
                    <!-- Red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                    <!-- Blue line, positioned to overlap the red line -->
                    <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem; /* 3px */"></div>
                  </div>

            <div class="md:w-2/5 mx-auto md:mx-0">
<img src="{{asset('MicrosoftTeams-image.png')}}" alt="" class="w-30 h-70">
<div class="w-full md:w-1/2 flex flex-col items-center mb-4 md:mb-0">
    <div class="flex items-center">
      <img src="{{asset('positionicon.png')}}" class="h-6">
      <p class="ml-2 text-sm">Nijverheidskaai, Anderlecht 1070</p>
    </div>
</div>
          </div>

        </section>
        --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
