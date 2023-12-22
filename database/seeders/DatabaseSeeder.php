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
            ["firstName" => "Adam", "lastName" => "Jones", "email" => "adam_j@example.com", "admin" => false],
            ["firstName" => "Sophie", "lastName" => "White", "email" => "sophie@example.com", "admin" => false],
            ["firstName" => "Nathan", "lastName" => "Anderson", "email" => "nathan@example.com", "admin" => false],
            ["firstName" => "Ava", "lastName" => "Wang", "email" => "ava@example.com", "admin" => false],
            ["firstName" => "Leo", "lastName" => "Nguyen", "email" => "leo@example.com", "admin" => false],
            ["firstName" => "Zara", "lastName" => "Hernandez", "email" => "zara@example.com", "admin" => false],
            ["firstName" => "Mason", "lastName" => "Davis", "email" => "mason@example.com", "admin" => false],
            ["firstName" => "Luna", "lastName" => "Martin", "email" => "luna@example.com", "admin" => false],
            ["firstName" => "James", "lastName" => "Evans", "email" => "james@example.com", "admin" => false],
            ["firstName" => "Mila", "lastName" => "O'Connor", "email" => "mila@example.com", "admin" => false],
            ["firstName" => "Jackson", "lastName" => "Lopez", "email" => "jackson@example.com", "admin" => false],
            ["firstName" => "Sophia", "lastName" => "Gómez", "email" => "sophia_g@example.com", "admin" => false],
            ["firstName" => "Caleb", "lastName" => "Vasiliev", "email" => "caleb@example.com", "admin" => false],
            ["firstName" => "Stella", "lastName" => "Petit", "email" => "stella@example.com", "admin" => false],
            ["firstName" => "Elijah", "lastName" => "Ricci", "email" => "elijah@example.com", "admin" => false],
            ["firstName" => "Maya", "lastName" => "Nielsen", "email" => "maya@example.com", "admin" => false],
            ["firstName" => "Evan", "lastName" => "Silva", "email" => "evan@example.com", "admin" => false],
            ["firstName" => "Zoe", "lastName" => "Rousseau", "email" => "zoe@example.com", "admin" => false],
            ["firstName" => "Daniel", "lastName" => "Nowak", "email" => "daniel@example.com", "admin" => false],
            ["firstName" => "Aria", "lastName" => "Hansen", "email" => "aria@example.com", "admin" => false],
            ["firstName" => "Liam", "lastName" => "Wilson", "email" => "liam_w@example.com", "admin" => false],
            ["firstName" => "Hannah", "lastName" => "Chen", "email" => "hannah@example.com", "admin" => false],
            ["firstName" => "Alexander", "lastName" => "Brown", "email" => "alex_b@example.com", "admin" => false],
            ["firstName" => "Grace", "lastName" => "Kováč", "email" => "grace@example.com", "admin" => false],
            ["firstName" => "Logan", "lastName" => "Martinez", "email" => "logan@example.com", "admin" => false],
            ["firstName" => "Emma", "lastName" => "Rodriguez", "email" => "emma_r@example.com", "admin" => false],
            ["firstName" => "Carter", "lastName" => "López", "email" => "carter@example.com", "admin" => false],
            ["firstName" => "Avery", "lastName" => "Díaz", "email" => "avery@example.com", "admin" => false],
            ["firstName" => "Wyatt", "lastName" => "Andersen", "email" => "wyatt@example.com", "admin" => false],
            ["firstName" => "Evelyn", "lastName" => "Romano", "email" => "evelyn@example.com", "admin" => false],
            ["firstName" => "Christopher", "lastName" => "Schmidt", "email" => "christopher@example.com", "admin" => false],
            ["firstName" => "Sofia", "lastName" => "Bauer", "email" => "sofia_b@example.com", "admin" => false],
            ["firstName" => "Owen", "lastName" => "Blanchard", "email" => "owen@example.com", "admin" => false],
            ["firstName" => "Emily", "lastName" => "Berg", "email" => "emily@example.com", "admin" => false],
            ["firstName" => "Daniel", "lastName" => "Møller", "email" => "daniel_m@example.com", "admin" => false],
            ["firstName" => "Madison", "lastName" => "Kelly", "email" => "madison@example.com", "admin" => false],
            ["firstName" => "Ethan", "lastName" => "Santos", "email" => "ethan_s@example.com", "admin" => false],
            ["firstName" => "Aubrey", "lastName" => "Leclerc", "email" => "aubrey@example.com", "admin" => false],
            ["firstName" => "Jackson", "lastName" => "Díaz", "email" => "jackson_d@example.com", "admin" => false],
            ["firstName" => "Aria", "lastName" => "Schmidt", "email" => "aria_s@example.com", "admin" => false],
            ["firstName" => "Lincoln", "lastName" => "Taylor", "email" => "lincoln@example.com", "admin" => false],
            ["firstName" => "Aurora", "lastName" => "Christensen", "email" => "aurora@example.com", "admin" => false],
            ["firstName" => "Cameron", "lastName" => "Rodríguez", "email" => "cameron@example.com", "admin" => false],
            ["firstName" => "Hailey", "lastName" => "Persson", "email" => "hailey@example.com", "admin" => false],
            ["firstName" => "Eli", "lastName" => "Vasiliev", "email" => "eli@example.com", "admin" => false],
            ["firstName" => "Scarlett", "lastName" => "Doyle", "email" => "scarlett@example.com", "admin" => false],
            ["firstName" => "Lucas", "lastName" => "Petit", "email" => "lucas_p@example.com", "admin" => false],
            ["firstName" => "Isabelle", "lastName" => "Ricci", "email" => "isabelle@example.com", "admin" => false],
            ["firstName" => "Grayson", "lastName" => "Nielsen", "email" => "grayson@example.com", "admin" => false],
            ["firstName" => "Lily", "lastName" => "O'Connell", "email" => "lily_o@example.com", "admin" => false],
            ["firstName" => "Lucas", "lastName" => "Hernandez", "email" => "lucas_h@example.com", "admin" => false],
            ["firstName" => "Madeline", "lastName" => "Virtanen", "email" => "madeline@example.com", "admin" => false],
            ["firstName" => "Henry", "lastName" => "Brown", "email" => "henry@example.com", "admin" => false],
            ["firstName" => "Zara", "lastName" => "Ferrari", "email" => "zara_f@example.com", "admin" => false],
            ["firstName" => "Leo", "lastName" => "García", "email" => "leo_g@example.com", "admin" => false],
            ["firstName" => "Emily", "lastName" => "Meier", "email" => "emily_m@example.com", "admin" => false],
            ["firstName" => "Sebastian", "lastName" => "Nowak", "email" => "sebastian_n@example.com", "admin" => false],
            ["firstName" => "Ava", "lastName" => "Janssen", "email" => "ava_j@example.com", "admin" => false],
            ["firstName" => "Caleb", "lastName" => "Papadopoulos", "email" => "caleb_p@example.com", "admin" => false],
            ["firstName" => "Hannah", "lastName" => "Smith", "email" => "hannah_s@example.com", "admin" => false],
            ["firstName" => "Ethan", "lastName" => "Rodríguez", "email" => "ethan_r@example.com", "admin" => false],
            ["firstName" => "Isabella", "lastName" => "O'Connor", "email" => "isabella_o@example.com", "admin" => false],
            ["firstName" => "Mason", "lastName" => "Brown", "email" => "mason_b@example.com", "admin" => false],
            ["firstName" => "Olivia", "lastName" => "Petrova", "email" => "olivia_p@example.com", "admin" => false],
            ["firstName" => "Liam", "lastName" => "Nilsson", "email" => "liam_n@example.com", "admin" => false],
            ["firstName" => "Aria", "lastName" => "Romano", "email" => "aria_r@example.com", "admin" => false],
            ["firstName" => "Jackson", "lastName" => "Lefevre", "email" => "jackson_l@example.com", "admin" => false],
            ["firstName" => "Avery", "lastName" => "Popescu", "email" => "avery_p@example.com", "admin" => false],
            ["firstName" => "Ella", "lastName" => "García", "email" => "ella_g@example.com", "admin" => false],
            ["firstName" => "Benjamin", "lastName" => "Santos", "email" => "benjamin_s@example.com", "admin" => false],
            ["firstName" => "Sophie", "lastName" => "Bauer", "email" => "sophie_b@example.com", "admin" => false],
            ["firstName" => "Logan", "lastName" => "Leroy", "email" => "logan_l@example.com", "admin" => false],
            ["firstName" => "Grace", "lastName" => "Kovač", "email" => "grace_k@example.com", "admin" => false],
            ["firstName" => "William", "lastName" => "Rousseau", "email" => "william_r@example.com", "admin" => false],
            ["firstName" => "Ava", "lastName" => "O'Reilly", "email" => "ava_o@example.com", "admin" => false],
            ["firstName" => "Noah", "lastName" => "Moreau", "email" => "noah_m@example.com", "admin" => false],
            ["firstName" => "Emma", "lastName" => "Ferrari", "email" => "emma_f@example.com", "admin" => false],
            ["firstName" => "Liam", "lastName" => "Williams", "email" => "liam_w@example.com", "admin" => false],
            ["firstName" => "Aria", "lastName" => "Christensen", "email" => "aria_c@example.com", "admin" => false],
            ["firstName" => "Oliver", "lastName" => "Rodríguez", "email" => "oliver_r@example.com", "admin" => false],
            ["firstName" => "Mia", "lastName" => "Persson", "email" => "mia_p@example.com", "admin" => false],
            ["firstName" => "Ethan", "lastName" => "Vasiliev", "email" => "ethan_v@example.com", "admin" => false],
            ["firstName" => "Ava", "lastName" => "Doyle", "email" => "ava_d@example.com", "admin" => false],
            ["firstName" => "Lucas", "lastName" => "Petit", "email" => "lucas_p@example.com", "admin" => false],
            ["firstName" => "Isabella", "lastName" => "Ricci", "email" => "isabella_r@example.com", "admin" => false],
            ["firstName" => "Grayson", "lastName" => "Nielsen", "email" => "grayson_n@example.com", "admin" => false],
            ["firstName" => "Emma", "lastName" => "Wilson", "email" => "emma_w@example.com", "admin" => false],
            ["firstName" => "Aiden", "lastName" => "O'Sullivan", "email" => "aiden_o@example.com", "admin" => false],
            ["firstName" => "Charlotte", "lastName" => "Lopez", "email" => "charlotte_l@example.com", "admin" => false],
            ["firstName" => "Daniel", "lastName" => "Romano", "email" => "daniel_r@example.com", "admin" => false],
            ["firstName" => "Zoé", "lastName" => "Lefevre", "email" => "zoe_l@example.com", "admin" => false],
            ["firstName" => "Alexander", "lastName" => "Lindberg", "email" => "alexander_l@example.com", "admin" => false],
            ["firstName" => "Niamh", "lastName" => "O'Reilly", "email" => "niamh_o@example.com", "admin" => false],
            ["firstName" => "Louis", "lastName" => "Moreau", "email" => "louis_m@example.com", "admin" => false],
            ["firstName" => "Giovanni", "lastName" => "Ferrari", "email" => "giovanni_f@example.com", "admin" => false],
            ["firstName" => "Lily", "lastName" => "Williams", "email" => "lily_w@example.com", "admin" => false],
            ["firstName" => "Samuel", "lastName" => "Christensen", "email" => "samuel_c@example.com", "admin" => false],
            ["firstName" => "Amelia", "lastName" => "Rodríguez", "email" => "amelia_r@example.com", "admin" => false],
            ["firstName" => "Jonas", "lastName" => "Persson", "email" => "jonas_p@example.com", "admin" => false],
            ["firstName" => "Elena", "lastName" => "Vasiliev", "email" => "elena_v@example.com", "admin" => false],
            ["firstName" => "Jacob", "lastName" => "Doyle", "email" => "jacob_d@example.com", "admin" => false],
            ["firstName" => "Camille", "lastName" => "Petit", "email" => "camille_p@example.com", "admin" => false],
            ["firstName" => "Enzo", "lastName" => "Ricci", "email" => "enzo_r@example.com", "admin" => false],
            ["firstName" => "Freja", "lastName" => "Nielsen", "email" => "freja_n@example.com", "admin" => false],
            ["firstName" => "Gabriel", "lastName" => "Silva", "email" => "gabriel_s@example.com", "admin" => false],
            ["firstName" => "Margaux", "lastName" => "Rousseau", "email" => "margaux_r@example.com", "admin" => false],
            ["firstName" => "Sebastian", "lastName" => "Nowak", "email" => "sebastian_n@example.com", "admin" => false],
            ["firstName" => "Nora", "lastName" => "Hansen", "email" => "nora_h@example.com", "admin" => false],
            ["firstName" => "Thomas", "lastName" => "McCarthy", "email" => "thomas_m@example.com", "admin" => false],
            ["firstName" => "Lina", "lastName" => "Kovač", "email" => "lina_k@example.com", "admin" => false],
            ["firstName" => "Luca", "lastName" => "Bauer", "email" => "luca_b@example.com", "admin" => false],
            ["firstName" => "Elodie", "lastName" => "Blanchard", "email" => "elodie_b@example.com", "admin" => false],
            ["firstName" => "Henrik", "lastName" => "Berg", "email" => "henrik_b@example.com", "admin" => false],
            ["firstName" => "Sofia", "lastName" => "Møller", "email" => "sofia_m@example.com", "admin" => false],
            ["firstName" => "Adam", "lastName" => "Kelly", "email" => "adam_k@example.com", "admin" => false],
            ["firstName" => "Victoria", "lastName" => "Santos", "email" => "victoria_s@example.com", "admin" => false],
            ["firstName" => "Hugo", "lastName" => "Leclerc", "email" => "hugo_l@example.com", "admin" => false],
            ["firstName" => "Emma", "lastName" => "Díaz", "email" => "emma_d@example.com", "admin" => false],
            ["firstName" => "Anton", "lastName" => "Schmidt", "email" => "anton_s@example.com", "admin" => false],
            ["firstName" => "Isla", "lastName" => "Taylor", "email" => "isla_t@example.com", "admin" => false],
            ["firstName" => "Liam", "lastName" => "Wilson", "email" => "liam_w@example.com", "admin" => false],
            ["firstName" => "Hannah", "lastName" => "Chen", "email" => "hannah_c@example.com", "admin" => false],
            ["firstName" => "Alexander", "lastName" => "Brown", "email" => "alexander_b@example.com", "admin" => false],
            ["firstName" => "Grace", "lastName" => "Kováč", "email" => "grace_k@example.com", "admin" => false],
            ["firstName" => "Mila", "lastName" => "Smith", "email" => "mila_s@example.com", "admin" => false],
            ["firstName" => "Henry", "lastName" => "García", "email" => "henry@example.com", "admin" => false],
            ["firstName" => "Aria", "lastName" => "Dupont", "email" => "aria_d@example.com", "admin" => false],
            ["firstName" => "Eli", "lastName" => "Johansson", "email" => "eli_j@example.com", "admin" => false],
            ["firstName" => "Lily", "lastName" => "Ivanova", "email" => "lily_i@example.com", "admin" => false],
            
        
        ];

        $i = 0;

                foreach ($usersData as $userData) {
                    $i++;
                    User::create([
                        'name' => $userData['firstName'],
                        'surname' => $userData['lastName'],
                        'email' => 'user' .$i . '@student.ehb.be',
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

    }
}
