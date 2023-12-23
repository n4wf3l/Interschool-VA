<!DOCTYPE html>
<html>

<head>
    <title>Verschil in scores</title>
</head>

<body
    style="font-family: 'Arial', sans-serif; background-color: #f5f5f5; color: #333; padding: 20px; text-align: left;">
    <div
        style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #333;">Verschil in Scores tussen {{$game->team1_name}} en {{$game->team2_name }}</h1>
        <p>Beste aanvoerders,</p>

        <p>Wij hebben een verschil geconstateerd tussen de doorgegeven scores van {{$game->team1_name }} en
            {{$game->team2_name }}. Om dit op te lossen, verzoeken wij jullie vriendelijk om de juiste scores naar deze
            mail te sturen.</p>

        <p>Bedankt voor jullie snelle reactie.</p>

        <p>Met vriendelijke groet,</p>
        <p style="color:red;">EhB Voetbal App</p>
    </div>
</body>

</html>