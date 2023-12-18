<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('myteam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1>Players in Your Team</h1>

                    @foreach($playerWithGoals as $player)
                            <div>
                                <p>{{ $player->user->name }} {{ $player->user->surname }}</p>
                                <p>Goals: {{ $player->goals }}</p> 
                                @if($player->teamleader == 1)
                                <p> teamleader </p>
                                @endif
                                @if($player->reserveplayer == 1)
                                <p> reserve </p>
                                @endif
                            </div>
                    @endforeach

                </div>
                <div class="p-6 text-gray-900">
                <h1>Games of Your Team</h1>

                    @foreach($teamGames as $game)
                        <div>
                            <p>{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }} {{ $game->team1->Teamnaam }} VS {{ $game->team2->Teamnaam }}  {{ $game->scoreTeam1 }} {{ $game->scoreTeam2 }} </p>

                            <!-- Add other game details as needed -->
                        </div>

                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
