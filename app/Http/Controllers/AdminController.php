<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
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
            ->select('team1.Teamnaam as team1_name', 'user1.name as team1_leader_name',
                'team2.Teamnaam as team2_name', 'user2.name as team2_leader_name')
            ->get();

        return view('admins.index', compact('teams', 'games'));
    }

    public function sendMessageToAllUsers(Request $request)
    {
        $messageContent = $request->input('notif');

        User::chunk(200, function ($users) use ($messageContent) {
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NotificationMail($messageContent));
            }
        });

        return back()->with('success', 'Message sent to all users.');
    }


}
