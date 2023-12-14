<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Schedule</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
</head>

<body>

    <div class="container">
        <h1>Tournament Schedule</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th>Score (Home - Away)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                <tr>
                    <td>{{ $game->date }}</td> <!-- Format date as needed -->
                    <td>{{ $game->team1->Teamnaam }}</td> <!-- Assuming 'name' is a field in the Team model -->
                    <td>{{ $game->team2->Teamnaam }}</td>
                    <td>{{ $game->scoreTeam1 }} - {{ $game->scoreTeam2 }}</td>
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

</body>

</html>