<?php

namespace App\Http\Controllers\Auth;

use App\Models\players;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;



class RegisteredUserController extends Controller
{


    /** JUISTE VERSIE */
    /**
     * toon de registratie pagina
     */
    public function create(): View|RedirectResponse
    {
        $selectedTeamID = request()->input('TeamID');
        session(['TeamID' => $selectedTeamID]);

        if ($selectedTeamID) {

            return view('auth.register');
        } else {
            return redirect()->route('registerteams');
        }



    }

    /**
     * registratie request wordt afgehandeld
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $teamID = session('TeamID');

        //valdiatie van de inputwaarden
        $request->validate([
            'name' => ['required_name'],
            'surname' => ['required_surname'],
            'email' => ['required_email', 'lowercase', 'email_format', Rule::unique('users', 'email'), 'student_email'],
            'reserveplayer' => ['required'],
            'teamleader' => ['required'],
            'password' => ['required', 'confirmed', 'min: 8'],


        ], [

            //error messages wanneer een waarde niet is gevalideerd

            'email.lowercase' => 'Het e-mailadres moet in kleine letters zijn',
            'email.unique' => 'Dit e-mailadres is al in gebruik',
            'reserveplayer.required' => 'Selecteer of je een reservespeler bent',
            'teamleader.required' => 'Selecteer of je een teamleider bent',
            'password.required' => 'Je moet een wachtwoord ingeven',
            'password.confirmed' => 'Wachtwoord bevestiging komt niet overeen',
            'password.min' => 'Wachtwoord moet minstens 8 karakters zijn'

        ]);

        $playersInTeam = Players::where('teamID', $teamID)->get();

        // Variabelen om bij te houden hoeveel teamleiders en reservespelers er zijn
        $leaderCount = 0;
        $reserveCount = 0;
        $playercount = 0;

        // Loop over alle spelers in het team
        foreach ($playersInTeam as $playerInTeam) {

            // Controleer of het een teamleider is
            if ($playerInTeam->teamleader) {
                $leaderCount++;
            }
            // Controleer of het een reservespeler is
            elseif ($playerInTeam->reserveplayer) {
                $reserveCount++;
            } else {
                $playercount++;
            }
            // Andere logica voor normale spelers indien nodig
        }


        if ($leaderCount === 1 && $request->teamleader == 1) {
            return redirect()->back()->with('error', 'Er kan slechts één teamleider zijn.')->with('showAlert', true);
        }

        // Controleer of er al twee reservespelers zijn
        if ($reserveCount === 2 && $request->reserveplayer == 1) {
            return redirect()->back()->with('error', 'Er kunnen slechts twee reservespelers zijn.')->with('showAlert', true);
        }

        // if ($playercount === 4 && $request->reserveplayer == 0 && $request->teamleader == 0) {
        // if ($playercount === 4 && $request->reserveplayer == 0 && $request->teamleader == 0) {
//     return redirect()->back()->with('error', 'Je moet voor een reservespeler of teamleader kiezen')->with('showAlert', true);
// }

        // Controleer wanneer er nog juist een teamleader moet zijn
        if ($playercount === 4 && $reserveCount === 2 && $request->teamleader == 0) {
            return redirect()->back()->with('error', 'Je moet een teamleader zijn binnen dit team.')->with('showAlert', true);
        }

        // Controleer wanneer er nog juist een of 2 reservespelers moeten zijn
        if ($leaderCount === 1 && $playercount === 4) {
            return redirect()->back()->with('error', 'Je moet een reservespeler zijn binnen dit team.')->with('showAlert', true);
        }


        //nieuwe user aanmaken en inputwaarden aan properties van user assignen
        $user = new User([


            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //user in de db saven
        $user->save();



        //nieuwe player aanmaken
        $player = new players([

            //userid is foreign key voor player link met user
            'userID' => $user->userID,
            'teamID' => $teamID,
            'reserveplayer' => $request->reserveplayer,
            'teamleader' => $request->teamleader

        ]);

        //player in db saven
        $player->save();

        event(new Registered($user));
        event(new Registered($player));


        Auth::login($user);

        $request->session()->forget('TeamID');

        return redirect('/login');
    }
}
