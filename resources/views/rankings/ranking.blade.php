<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament ranking</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<h1>Team Ranking</h1>

<table>
    <thead>
        <tr>
            <th>Rank</th>
            <th>Team</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($rankedTeams as $index => $team)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $team->Teamnaam }}</td>
                <td>{{ $team->points }}</td>
            </tr>
        @endforeach
        
    </tbody>
</table>
</body>
</html>