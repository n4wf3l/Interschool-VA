<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Mail\UnsolvedScoreNotificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\teams;
use App\Models\players;
use App\Models\games;
use Illuminate\Http\Request;
use Notification;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $teams = Teams::all();
        $players = players::all();


        $playersWithGoals = [];


        $games = games::where('bevestigd', false)
            ->join('teams as team1', 'games.team1ID', '=', 'team1.TeamID')
            ->join('teams as team2', 'games.team2ID', '=', 'team2.TeamID')
            ->join('players as player1', function ($join) {
                $join->on('team1.TeamID', '=', 'player1.teamID')
                    ->where('player1.teamleader', true);
            })
            ->join('players as player2', function ($join) {
                $join->on('team2.TeamID', '=', 'player2.teamID')
                    ->where('player2.teamleader', true);
            })
            ->join('users as user1', 'player1.userID', '=', 'user1.userID')
            ->join('users as user2', 'player2.userID', '=', 'user2.userID')
            ->select('games.gameID', 'games.date as date_game', 'games.team1ID', 'games.team2ID', 'team1.Teamnaam as team1_name', 'user1.name as team1_leader_name',
                'team2.Teamnaam as team2_name', 'user2.name as team2_leader_name')
            ->get();

        foreach ($games as $game) {
            $team1ID = $game->team1ID;
            $team2ID = $game->team2ID;

            $team1Players = Players::with('team')->where('teamID', $team1ID)->get();
            $team2Players = Players::with('team')->where('teamID', $team2ID)->get();

            $playersWithGoals[$game->gameID] = [
                'team1' => $team1Players,
                'team2' => $team2Players,
            ];

        }





        return view('admins.index', compact('teams', 'games', 'playersWithGoals'));
    }

    public function sendMessageToAllUsers(Request $request)
    {
        $messageContent = $request->input('notif');

        User::chunk(200, function ($users) use ($messageContent) {
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NotificationMail($messageContent));
            }
        });

        return back()->with('success', 'Bericht verzonden naar alle gebruikers.');
    }

    public function unsolvedScoreNotifier($gameId)
    {

        $game = games::where('gameID', $gameId)
            ->join('teams as team1', 'games.team1ID', '=', 'team1.TeamID')
            ->join('teams as team2', 'games.team2ID', '=', 'team2.TeamID')
            ->join('players as player1', function ($join) {
                $join->on('team1.TeamID', '=', 'player1.teamID')
                    ->where('player1.teamleader', true);
            })
            ->join('players as player2', function ($join) {
                $join->on('team2.TeamID', '=', 'player2.teamID')
                    ->where('player2.teamleader', true);
            })
            ->join('users as user1', 'player1.userID', '=', 'user1.userID')
            ->join('users as user2', 'player2.userID', '=', 'user2.userID')
            ->select('games.gameID', 'team1.Teamnaam as team1_name', 'user1.email as team1_leader_email',
                'team2.Teamnaam as team2_name', 'user2.email as team2_leader_email')
            ->first();

        if ($game) {
            Mail::to($game->team1_leader_email)->send(new UnsolvedScoreNotificationMail($game));
            Mail::to($game->team2_leader_email)->send(new UnsolvedScoreNotificationMail($game));

            return back()->with('sent', 'E-mails verstuurd naar teamleiders voor game ' . $gameId);
        } else {
            return back()->with('error', 'Game niet gevonden.');
        }
    }

    public function saveDefinitiveScores(Request $request, $gameId)
    {
        $validatedData = $request->validate([
            'scoreTeam1' => 'required|integer',
            'scoreTeam2' => 'required|integer',
            'players_goals' => 'required|array',
            'players_goals.*' => 'integer|min:0',

        ]);


        $game = Games::find($gameId);
        if (!$game) {
            return redirect()->back()->with('error', 'Game niet gevonden.');
        }

        $team1GoalsSum = 0;
        $team2GoalsSum = 0;
        foreach ($validatedData['players_goals'] as $playerID => $goals) {
            $player = Players::find($playerID);
            if ($player) {
                if ($player->teamID == $game->team1ID) {
                    $team1GoalsSum += $goals;
                } elseif ($player->teamID == $game->team2ID) {
                    $team2GoalsSum += $goals;
                }
            }
        }

        if ($team1GoalsSum != $validatedData['scoreTeam1'] || $team2GoalsSum != $validatedData['scoreTeam2']) {
            return redirect()->back()->with('errorScore', 'De teamscores komen niet overeen met de som van de individuele doelpunten van de spelers.');
        }

        $game->scoreTeam1 = $validatedData['scoreTeam1'];
        $game->scoreTeam2 = $validatedData['scoreTeam2'];
        $game->bevestigd = 1; // Mark as confirmed
        $game->save();

        foreach ($validatedData['players_goals'] as $playerID => $goals) {
            $player = Players::find($playerID);
            if ($player) {
                $player->goals = $goals;
                $player->save();
            }
        }

        return redirect()->back()->with('successScore', 'Definitieve scores en doelpunten van spelers succesvol opgeslagen.');
    }


}
