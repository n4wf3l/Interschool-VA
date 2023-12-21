<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
</head>

<body>

    <div class="container">
        <h1>Admin</h1>
        <h2>Ingeschreven teams</h2>
        <table class="table">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                <tr>
                    <td>{{ $team->Teamnaam }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
    </form>
    <h2>Bericht alle aanvoerders </h2>
    <form action="{{ route('send-message') }}" method="POST">
        @csrf

        <label for="notif">Message</label>
        <textarea id="notif" name="notif"></textarea>

        <button type="submit" class="btn btn-danger">
            Sturen
        </button>
    </form>

    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif


    <h2>Onopgeloste resultaten</h2>
    <ul>
        @foreach($games as $game)
        <li>
            <strong>Game:</strong> Team 1: {{ $game->team1_name }} (Leader: {{ $game->team1_leader_name }}) vs
            Team 2:
            {{ $game->team2_name }} (Leader: {{ $game->team2_leader_name }})
            <form action="{{ route('notify-team-leaders', ['game' => $game->gameID]) }}" method="POST">
                @csrf
                <button type="submit">Notify Team Leaders</button>
            </form>

        </li>
        @endforeach
    </ul>

    @if(session('sent'))
    <div>{{ session('sent') }}</div>
    @endif

    <h2>Resultaten aanpassen</h2>
    @foreach($games as $game)
    <form action="{{ route('admins.save-scores', ['game' => $game->gameID]) }}" method="POST">
        @csrf

        <label for="scoreTeam1">Score for Team 1:</label>
        <input type="number" name="scoreTeam1" id="scoreTeam1" required>

        <label for="scoreTeam2">Score for Team 2:</label>
        <input type="number" name="scoreTeam2" id="scoreTeam2" required>

        @foreach($player1WithGoals as $player)
        <div>
            <label>{{ $player->user->name }}: </label>
            <input type="number" name="players_goals[{{ $player->playerID }}]" value="{{ $player->goals }}" required>
        </div>
        @endforeach
        <br>
        <hr>
        <hr>
        <br>
        @foreach($player2WithGoals as $player)
        <div>
            <label>{{ $player->user->name }}: </label>
            <input type="number" name="players_goals[{{ $player->playerID }}]" value="{{ $player->goals }}" required>
        </div>
        @endforeach

        <button type="submit">Save Scores</button>
    </form>
    @endforeach



</body>

</html>