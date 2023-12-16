<?php

namespace App\Http\Controllers;

use App\Models\teams;
use App\Models\players;
use App\Http\Requests\StoreteamsRequest;
use App\Http\Requests\UpdateteamsRequest;
use Illuminate\Support\Facades\Auth;


class TeamsController extends Controller
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
        $playerWithGoals = Players::where('teamID', $teamID)->get();


        // Check if the player with goals exists
        if (!$playerWithGoals) {
            return redirect()->route('myteam')->with('error', 'Player with goals not found for the team.');
        }

        return view('myteam', compact('playerWithGoals'));
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
