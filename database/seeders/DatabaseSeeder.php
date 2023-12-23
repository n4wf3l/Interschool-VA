<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\teams;
use App\Models\players;
use App\Models\games;
use App\Models\Archived_game;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Creëer een admin gebruiker
        User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'info.va.ehb@gmail.com',
            'admin' => true,
            'password' => bcrypt('password'),
        ]);


        //Usersseeder

        // Other users
        $usersData = [
            ["firstName" => "Emma", "lastName" => "Müller", "email" => "emma@example.com", "admin" => false],
            ["firstName" => "Luca", "lastName" => "Rossi", "email" => "luca@example.com", "admin" => false],
            ["firstName" => "Sofia", "lastName" => "García", "email" => "sofia@example.com", "admin" => false],
            ["firstName" => "Oliver", "lastName" => "Smith", "email" => "oliver@example.com", "admin" => false],
            ["firstName" => "Marie", "lastName" => "Dupont", "email" => "marie@example.com", "admin" => false],
            ["firstName" => "Emil", "lastName" => "Johansson", "email" => "emil@example.com", "admin" => false],
            ["firstName" => "Anastasia", "lastName" => "Ivanova", "email" => "anastasia@example.com", "admin" => false],
            ["firstName" => "Aiden", "lastName" => "O'Connor", "email" => "aiden@example.com", "admin" => false],
            ["firstName" => "Clara", "lastName" => "Gómez", "email" => "clara@example.com", "admin" => false],
            ["firstName" => "Hugo", "lastName" => "Janssen", "email" => "hugo@example.com", "admin" => false],
            ["firstName" => "Alice", "lastName" => "Bernard", "email" => "alice@example.com", "admin" => false],
            ["firstName" => "Adrian", "lastName" => "Kowalski", "email" => "adrian@example.com", "admin" => false],
            ["firstName" => "Eva", "lastName" => "Novak", "email" => "eva@example.com", "admin" => false],
            ["firstName" => "Liam", "lastName" => "O'Sullivan", "email" => "liam@example.com", "admin" => false],
            ["firstName" => "Ines", "lastName" => "Lopez", "email" => "ines@example.com", "admin" => false],
            ["firstName" => "Felix", "lastName" => "Schmitt", "email" => "felix@example.com", "admin" => false],
            ["firstName" => "Anna", "lastName" => "Petrova", "email" => "anna@example.com", "admin" => false],
            ["firstName" => "Noah", "lastName" => "Murphy", "email" => "noah@example.com", "admin" => false],
            ["firstName" => "Juliette", "lastName" => "Martin", "email" => "juliette@example.com", "admin" => false],
            ["firstName" => "Mateo", "lastName" => "Fernández", "email" => "mateo@example.com", "admin" => false],
            ["firstName" => "Léa", "lastName" => "Dubois", "email" => "lea@example.com", "admin" => false],
            ["firstName" => "Elias", "lastName" => "Svensson", "email" => "elias@example.com", "admin" => false],
            ["firstName" => "Elina", "lastName" => "Virtanen", "email" => "elina@example.com", "admin" => false],
            ["firstName" => "Ethan", "lastName" => "Walsh", "email" => "ethan@example.com", "admin" => false],
            ["firstName" => "Olivia", "lastName" => "Pérez", "email" => "olivia@example.com", "admin" => false],
            ["firstName" => "Lucas", "lastName" => "Meier", "email" => "lucas@example.com", "admin" => false],
            ["firstName" => "Mia", "lastName" => "Schmidt", "email" => "mia@example.com", "admin" => false],
            ["firstName" => "David", "lastName" => "Popescu", "email" => "david@example.com", "admin" => false],
            ["firstName" => "Chloe", "lastName" => "Brown", "email" => "chloe@example.com", "admin" => false],
            ["firstName" => "Daniel", "lastName" => "García", "email" => "daniel@example.com", "admin" => false],
            ["firstName" => "Laura", "lastName" => "Fontana", "email" => "laura@example.com", "admin" => false],
            ["firstName" => "Victor", "lastName" => "Nilsson", "email" => "victor@example.com", "admin" => false],
            ["firstName" => "Sofia", "lastName" => "Papadopoulos", "email" => "sofia_p@example.com", "admin" => false],
            ["firstName" => "Oscar", "lastName" => "Byrne", "email" => "oscar@example.com", "admin" => false],
            ["firstName" => "Emma", "lastName" => "Andersen", "email" => "emma_a@example.com", "admin" => false],
            ["firstName" => "Max", "lastName" => "Zimmermann", "email" => "max@example.com", "admin" => false],
            ["firstName" => "Isabella", "lastName" => "Rizzo", "email" => "isabella@example.com", "admin" => false],
            ["firstName" => "Benjamin", "lastName" => "O'Kelly", "email" => "benjamin@example.com", "admin" => false],
            ["firstName" => "Charlotte", "lastName" => "Leroy", "email" => "charlotte@example.com", "admin" => false],
            ["firstName" => "Matteo", "lastName" => "Romano", "email" => "matteo@example.com", "admin" => false],
            ["firstName" => "Zoé", "lastName" => "Lefevre", "email" => "zoe@example.com", "admin" => false],
            ["firstName" => "Alexander", "lastName" => "Lindberg", "email" => "alexander@example.com", "admin" => false],
            ["firstName" => "Niamh", "lastName" => "O'Reilly", "email" => "niamh@example.com", "admin" => false],
            ["firstName" => "Louis", "lastName" => "Moreau", "email" => "louis@example.com", "admin" => false],
            ["firstName" => "Giovanni", "lastName" => "Ferrari", "email" => "giovanni@example.com", "admin" => false],
            ["firstName" => "Lily", "lastName" => "Williams", "email" => "lily@example.com", "admin" => false],
            ["firstName" => "Samuel", "lastName" => "Christensen", "email" => "samuel@example.com", "admin" => false],
            ["firstName" => "Amelia", "lastName" => "Rodríguez", "email" => "amelia@example.com", "admin" => false],
            ["firstName" => "Jonas", "lastName" => "Persson", "email" => "jonas@example.com", "admin" => false],
            ["firstName" => "Elena", "lastName" => "Vasiliev", "email" => "elena@example.com", "admin" => false],
            ["firstName" => "Jacob", "lastName" => "Doyle", "email" => "jacob@example.com", "admin" => false],
            ["firstName" => "Camille", "lastName" => "Petit", "email" => "camille@example.com", "admin" => false],
            ["firstName" => "Enzo", "lastName" => "Ricci", "email" => "enzo@example.com", "admin" => false],
            ["firstName" => "Freja", "lastName" => "Nielsen", "email" => "freja@example.com", "admin" => false],
            ["firstName" => "Gabriel", "lastName" => "Silva", "email" => "gabriel@example.com", "admin" => false],
            ["firstName" => "Margaux", "lastName" => "Rousseau", "email" => "margaux@example.com", "admin" => false],
            ["firstName" => "Sebastian", "lastName" => "Nowak", "email" => "sebastian@example.com", "admin" => false],
            ["firstName" => "Nora", "lastName" => "Hansen", "email" => "nora@example.com", "admin" => false],
            ["firstName" => "Thomas", "lastName" => "McCarthy", "email" => "thomas@example.com", "admin" => false],
            ["firstName" => "Lina", "lastName" => "Kovač", "email" => "lina@example.com", "admin" => false],
            ["firstName" => "Luca", "lastName" => "Bauer", "email" => "luca_b@example.com", "admin" => false],
            ["firstName" => "Elodie", "lastName" => "Blanchard", "email" => "elodie@example.com", "admin" => false],
            ["firstName" => "Henrik", "lastName" => "Berg", "email" => "henrik@example.com", "admin" => false],
            ["firstName" => "Sofia", "lastName" => "Møller", "email" => "sofia_m@example.com", "admin" => false],
            ["firstName" => "Adam", "lastName" => "Kelly", "email" => "adam@example.com", "admin" => false],
            ["firstName" => "Victoria", "lastName" => "Santos", "email" => "victoria@example.com", "admin" => false],
            ["firstName" => "Hugo", "lastName" => "Leclerc", "email" => "hugo_l@example.com", "admin" => false],
            ["firstName" => "Emma", "lastName" => "Díaz", "email" => "emma_d@example.com", "admin" => false],
            ["firstName" => "Anton", "lastName" => "Schmidt", "email" => "anton@example.com", "admin" => false],
            ["firstName" => "Isla", "lastName" => "Taylor", "email" => "isla@example.com", "admin" => false],






        ];

        $i = 0;

        foreach ($usersData as $userData) {
            $i++;
            User::create([
                'name' => $userData['firstName'],
                'surname' => $userData['lastName'],
                'email' => 'user' . $i . '@student.ehb.be',
                'admin' => $userData['admin'],
                'password' => bcrypt('password'),
                'email_verified_at' => '2023-12-09 14:32:23',
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

        $x = 0;
        //playersseeder
        for ($teamID = 1; $teamID <= 10; $teamID++) {
            // Maak een teamleider aan
            Players::create([
                'teamID' => $teamID,
                'userID' => (($x * 7) + 1), // Bijvoorbeeld: team 1 heeft gebruiker 10 als teamleider
                'reserveplayer' => false,
                'teamleader' => true,
                'goals' => 2,
            ]);




            // Maak 2 reservespelers aan
            for ($i = 2; $i <= 3; $i++) {
                Players::create([
                    'teamID' => $teamID,
                    'userID' => (($x * 7) + $i), // Bijvoorbeeld: team 1 heeft gebruikers 11 en 12 als reservespelers
                    'reserveplayer' => true,
                    'teamleader' => false,
                    'goals' => 0,
                ]);
            }

            // Maak 4 reguliere spelers aan
            for ($i = 4; $i <= 7; $i++) {
                Players::create([
                    'teamID' => $teamID,
                    'userID' => (($x * 7) + $i), // Bijvoorbeeld: team 1 heeft gebruikers 13 t/m 16 als reguliere spelers
                    'reserveplayer' => false,
                    'teamleader' => false,
                    'goals' => 0,
                ]);
            }

            $x++;
        }



        //gamesseeder
        $teamsCount = 10; // Aantal teams

        // Loop over elk team
        for ($team1ID = 1; $team1ID <= $teamsCount; $team1ID++) {
            // Loop over alle andere teams
            for ($team2ID = $team1ID + 1; $team2ID <= $teamsCount; $team2ID++) {
                // Zorg ervoor dat teams niet tegen zichzelf spelen
                if ($team1ID != $team2ID) {
                    // Maak een game aan
                    Games::create([
                        'team1ID' => $team1ID,
                        'team2ID' => $team2ID,
                        'date' => now(),
                    ]);
                }
            }
        }


        //archived games
        for ($i = 1; $i <= 5; $i++) {
            Archived_game::create([
                'year' => 2023 + $i,  // Assuming the years start from 2023 and increment by 1 for each record
                'teamname' => "Team " . $i,
                'points' => rand(1, 80),  // Random points for demonstration
                'topscorer_name' => 'topscorer' . $i,
                'topscorer_goals' => rand(1, 40),  // Random number of goals for demonstration
            ]);
        }

    }
}
