<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teams;
use App\Models\games;

class RankingController extends Controller
{
    //show ranking
    public function showRankings(){

        $rankedTeams = teams::orderByDesc('points')->get(); //get the teams out the db and in descending order
        
        return view('rankings.ranking', ['rankedTeams'=> $rankedTeams]);
        
    }


    public function updateRanking(){


        

    }







}
