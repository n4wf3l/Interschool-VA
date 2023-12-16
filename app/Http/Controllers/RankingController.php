<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teams;
use App\Models\games;
use App\Models\players;

class RankingController extends Controller
{
    //show Teams ranking
    public function showTeamRankings(){

        $rankedTeams = teams::orderByDesc('points')->get(); //get the teams out the db and in descending order in the array
        
        return view('rankings.ranking', ['rankedTeams'=> $rankedTeams]);// sending ranked teams array to the view
        
    }


    public function updateTeamsRanking(){




    }


    public function showGoalScorersRanking(){

        $rankedPlayers = players::orderByDesc('goals')->get(); //get the players out the db and in descending order in the array
        
        return view('rankings.ranking', ['rankedPlayers'=> $rankedPlayers]);// sending ranked players array to the view
        


    }







}
