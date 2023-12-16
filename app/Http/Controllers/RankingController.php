<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teams;
use App\Models\games;
use App\Models\players;

class RankingController extends Controller
{
    //show Teams ranking
    public function showRankings(){

        $rankedTeams = teams::orderByDesc('points')->get(); //get the teams out the db and in descending order in the array
        $rankedPlayers = players::orderByDesc('goals')->get(); //get the players out the db and in descending order in the array
        
        return view('rankings.ranking', ['rankedTeams'=> $rankedTeams], ['rankedPlayers'=>$rankedPlayers]);// sending ranked teams and goalscorers arrays to the view
        
    }


    public function updateRankings(){




    }









}
