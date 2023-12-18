<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\teams;
use App\Models\players;
use App\Models\games;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        //Usersseeder
        for ($i = 1; $i <= 200; $i++) {
            User::create([
                'name' => 'name' . $i,
                'surname' => 'User' . $i,
                'email' => 'user' . $i . '@example.com',
                'admin' => false,
                'password' => bcrypt('password'),
            ]);
        }


        //teamsseeder
        $teamleaderid = 1;
        // Loop over elk team
        for ($i = 1; $i <= 10; $i++) {
            // Maak een team aan
            Teams::create([
                'Teamnaam' => 'Team ' . $i,
                'teamleaderID' => ($teamleaderid),
            ]);

            $teamleaderid += 7;
        }

        //playersseeder
        for ($teamID = 1; $teamID <= 10; $teamID++) {
            // Maak een teamleider aan
            Players::create([
                'teamID' => $teamID,
                'userID' => ($teamID * 10), // Bijvoorbeeld: team 1 heeft gebruiker 10 als teamleider
                'reserveplayer' => false,
                'teamleader' => true,
                'goals' => 2,
            ]);

            // Maak 2 reservespelers aan
            for ($i = 1; $i <= 2; $i++) {
                Players::create([
                    'teamID' => $teamID,
                    'userID' => ($teamID * 10 + $i), // Bijvoorbeeld: team 1 heeft gebruikers 11 en 12 als reservespelers
                    'reserveplayer' => true,
                    'teamleader' => false,
                    'goals' => 0,
                ]);
            }

            // Maak 4 reguliere spelers aan
            for ($i = 3; $i <= 6; $i++) {
                Players::create([
                    'teamID' => $teamID,
                    'userID' => ($teamID * 10 + $i), // Bijvoorbeeld: team 1 heeft gebruikers 13 t/m 16 als reguliere spelers
                    'reserveplayer' => false,
                    'teamleader' => false,
                    'goals' => 0,
                ]);
            }
        }


        /*
                //gamesseeder
                $teamsCount = 10; // Aantal teams

                // Loop over elk team
                for ($team1ID = 1; $team1ID <= $teamsCount; $team1ID++) {
                    // Loop over alle andere teams
                    for ($team2ID = $team1ID+1; $team2ID <= $teamsCount; $team2ID++) {
                        // Zorg ervoor dat teams niet tegen zichzelf spelen
                        if ($team1ID != $team2ID) {
                            // Maak een game aan
                            Games::create([
                                'team1ID' => $team1ID,
                                'team2ID' => $team2ID,
                                'date' => now(),
                                'scoreTeam1' => rand(0, 5), // Willekeurige score, pas aan indien nodig
                                'scoreTeam2' => rand(0, 5),
                            ]);
                        }
                     }
                }
                */

    }
}
