<?php

namespace App\Http\Controllers;

use App\Models\teams;
use App\Models\players;
use App\Models\games;
use App\Http\Requests\StoreteamsRequest;
use App\Http\Requests\UpdateteamsRequest;
use App\Http\Requests\updatePlayerGoalsRequest;

use App\Http\Requests\StoreTeamNameRequest;
use Illuminate\Support\Facades\Auth;


class MyTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Retrieve the player associated with the logged-in user
        $player = Players::where('userID', $user->userID)->first();
    
        // Check if the player exists
        if (!$player) {
            return redirect()->route('myteam')->with('error', 'Player not found for the logged-in user.');
        }
    
        // Retrieve player's team and their goals attribute
        $teamID = $player->teamID;
        $playerWithGoals = Players::with('team')->where('teamID', $teamID)->get();
    
        // Retrieve games for the team
        $teamGames = Games::with(['team1', 'team2'])->where('team1ID', $teamID)
            ->orWhere('team2ID', $teamID)
            ->get();
    
        // Check if the player with goals exists
        if (!$playerWithGoals) {
            return redirect()->route('myteam')->with('error', 'Player with goals not found for the team.');
        }
    
        // Check if the logged-in user is a team leader
        $isTeamLeader = ($player->teamleader === 1);
    
        return view('myteam', compact('playerWithGoals', 'teamGames', 'isTeamLeader'));
    }
    
public function updateTeamName(StoreTeamNameRequest $request)
    {

        $user = Auth::user();

        $player = Players::where('userID', $user->userID)->first();

        // Check if the logged-in user is a team leader
        if ($player->teamleader !== 1) {
            return redirect()->route('myteam')->with('error', 'You are not authorized to update the team name.');
        }

        // Validate the form data
        $request->validate([
            'newTeamName' => 'required|string|max:255',
        ]);

        // Retrieve the player associated with the logged-in user
        $player = Players::where('userID', $user->userID)->first();

        // Retrieve the team
        $team = Teams::find($player->teamID);

        // Update the team name
        $team->Teamnaam = $request->input('newTeamName');
        $team->save();

        return redirect()->route('updateTeamName')->with('status', 'Team name updated successfully.');
    }

    public function updatePlayerGoals(updatePlayerGoalsRequest $request)
{
    $user = Auth::user();

    $player = Players::where('userID', $user->userID)->first();

        // Check if the logged-in user is a team leader
        if ($player->teamleader !== 1) {
            return redirect()->route('myteam')->with('error', 'You are not authorized to update the team name.');
        }

    // Validate the form data
    $request->validate([
        'player_goals' => 'required|array',
        'player_goals.*' => 'integer|min:0',
    ]);

    // Update the goals for each player
    foreach ($request->input('player_goals') as $playerId => $goals) {
        $player = Players::find($playerId);
        $player->goals = $goals;
        $player->save();
    }

    return redirect()->route('myteam')->with('status', 'Player goals updated successfully.');
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreteamsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(teams $teams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teams $teams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateteamsRequest $request, teams $teams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teams $teams)
    {
        //
    }
}
