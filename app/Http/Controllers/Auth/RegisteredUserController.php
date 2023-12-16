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
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * toon de registratie pagina
     */
    public function create(): View
    {
        $selectedTeamID = request()->input('TeamID');
        session(['TeamID' => $selectedTeamID]);

        return view('auth.register');

        
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
            'name' => ['required'],
            'surname' =>['required'],
            'email' => ['required', 'lowercase', 'email'],  
            'reserveplayer'=>['required'],
            'teamleader'=>['required'],
            'password' => ['required', 'confirmed'],
            
        ]);
        
        $playersInTeam = players::where('teamID', $teamID)->get();

        // Variabelen om bij te houden hoeveel teamleiders en reservespelers er zijn
        $leaderCount = 0;
        $reserveCount = 0;

        // Loop over alle spelers in het team
        foreach ($playersInTeam as $playerInTeam) {
            // Controleer of het een teamleider is
            if ($playerInTeam->teamleader) {
                $leaderCount++;
            }
            // Controleer of het een reservespeler is
            elseif ($playerInTeam->reserveplayer) {
                $reserveCount++;
            }
            // Andere logica voor normale spelers indien nodig
        }


        // Controleer of er al een teamleider is
        if ($leaderCount === 1 && $request->teamleader == 1) {
            return redirect()->back()->with('error', 'Er kan slechts één teamleider zijn.');
        }

        // Controleer of er al twee reservespelers zijn
        if ($reserveCount === 2 && $request->reserveplayer == 1) {
            return redirect()->back()->with('error', 'Er kunnen slechts twee reservespelers zijn.');
        }


        //nieuwe user aanmaken en inputwaarden aan properties van user assignen
        $user = new User([
            
            'name' => $request->name,
            'surname'=>$request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //user in de db saven
        $user->save();

        
        //nieuwe player aanmaken
        $player = new players([

            //userid is foreign key voor player link met user
            'userID'=>$user->userID,
            'teamID'=>$teamID,
            'reserveplayer'=>$request->reserveplayer,
            'teamleader'=>$request->teamleader
            
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
