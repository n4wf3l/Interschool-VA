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

</body>

</html>