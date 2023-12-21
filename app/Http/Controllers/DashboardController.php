<?php

namespace App\Http\Controllers;

use App\Models\teams;
use App\Models\players;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showTeams()
    {
        //fetch all the teams
        $teams = teams::all();

        //fetch the player with most goals
        $topScorer = players::orderBy('goals', 'desc')->first();

        //fetching players per team
        $players = players::all()->groupBy('teamID');

        //pass the variabels to the view
        return view('dashboard', ['teams' => $teams, 'topscorer' => $topScorer, 'players' => $players]);
    }

}




