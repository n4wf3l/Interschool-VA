<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\games;
use Illuminate\Http\Request;
use App\Models\teams;
use App\Models\players;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class TournamentController extends Controller
{

    public function index()
    {
        $games = games::with(['team1', 'team2'])->orderBy('date', 'asc')->get();

        return view('calendars.index', ['games' => $games]);
    }

    public function createSchedule()
    {
        $all_teams = teams::all();

        // Ensure we have an even number of teams
        if ($all_teams->count() % 2 != 0 || $all_teams->count() != 10) {
            return redirect()->back()->with('status', '10 teams are required to generate a new tournament.');

        }

        $schedule = $this->generateRoundRobinSchedule($all_teams);

        $startDate = Carbon::parse('Friday next week')->setTime(20, 0); // Start date, next Friday at 20:00
        $gameNumber = 0;

        // Save games to database
        foreach ($schedule as $round => $matches) {
            foreach ($matches as $match) {
                $date = $this->calculateGameDateTime($startDate, $gameNumber);

                games::create([
                    'team1ID' => $match['home']->TeamID,
                    'team2ID' => $match['away']->TeamID,
                    'date' => $date, // Example: one game per week
                    // 'scoreTeam1' and 'scoreTeam2' can be left empty for now
                ]);
                $gameNumber++;
            }
        }

        return redirect()->route('admins.index')->with('status', 'the tournament has been created successfully.');
    }



    private function generateRoundRobinSchedule($all_teams)
    {
        $totalRounds = $all_teams->count() - 1;
        $matchesPerRound = $all_teams->count() / 2;
        $schedule = [];

        for ($round = 0; $round < $totalRounds; $round++) {
            foreach ($all_teams as $key => $team) {
                if ($key % 2 == 0 && $key / 2 < $matchesPerRound) {
                    $home = $all_teams[$key];
                    $away = $all_teams[($key + $totalRounds) % $all_teams->count()];
                    $schedule[$round][] = ['home' => $home, 'away' => $away];
                }
            }

            $all_teams = $this->rotateTeams($all_teams);
        }

        return $schedule;
    }

    private function rotateTeams($teams)
    {
        $firstTeam = $teams->slice(0, 1); // Get the first team
        $remainingTeams = $teams->slice(1); // Get the remaining teams

        $lastTeam = $remainingTeams->pop(); // Remove the last team
        $remainingTeams->prepend($lastTeam); // Add it to the beginning

        return $firstTeam->merge($remainingTeams); // Merge the first team back with the rotated teams
    }

    private function calculateGameDateTime($startDate, $gameCount)
    {
        $weekOffset = intval($gameCount / 5);
        $gameOfWeek = $gameCount % 5;

        // Calculate the day of the week (Friday, Saturday, Sunday) and time
        $dayOffset = 0;
        $hour = 20; // Default to 20:00

        if ($gameOfWeek == 0) {
            // Friday game
            $dayOffset = 0;
            $hour = 20;
        } else if ($gameOfWeek <= 2) {
            // Saturday games
            $dayOffset = 1;
            $hour = ($gameOfWeek == 1) ? 18 : 19; // First game at 18:00, second at 19:00
        } else {
            // Sunday games
            $dayOffset = 2;
            $hour = ($gameOfWeek == 3) ? 18 : 19; // First game at 18:00, second at 19:00
        }

        return $startDate->copy()->addWeeks($weekOffset)->addDays($dayOffset)->setHour($hour);
    }

    public function resetTournament()
    {
        $adminUsers = User::where('admin', 1)->get(['userID', 'name', 'surname', 'email', 'admin', 'password']);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        games::truncate();
        players::truncate();
        teams::truncate();
        User::truncate();

        foreach ($adminUsers as $adminUser) {
            $newUser = new User();
            $newUser->userID = $adminUser->userID;
            $newUser->name = $adminUser->name;
            $newUser->surname = $adminUser->surname;
            $newUser->email = $adminUser->email;
            $newUser->admin = $adminUser->admin;
            $newUser->password = $adminUser->password;
            $newUser->save();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->back()->with('status', 'Tournament reset successfully.');
    }

}
