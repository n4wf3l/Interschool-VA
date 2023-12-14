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
        return view('auth.register');
    }

    /**
     * registratie request wordt afgehandeld
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //valdiatie van de inputwaarden
        $request->validate([
            'name' => ['required'],
            'surname' =>['required'],
            'email' => ['required', 'lowercase', 'email'],  
            'reserveplayer'=>['required'],
            'teamleader'=>['required'],
            'password' => ['required', 'confirmed'],
            
        ]);
        
        
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
            'teamID'=>1,
            'reserveplayer'=>$request->reserveplayer,
            'teamleader'=>$request->teamleader
            
        ]);

        //player in db saven
        $player->save();

        event(new Registered($user));
        event(new Registered($player));


        Auth::login($user);

        return redirect('/login');
    }
}
