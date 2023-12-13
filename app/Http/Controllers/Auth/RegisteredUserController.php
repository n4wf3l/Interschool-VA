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
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => ['required'],
            'surname' =>['required'],
            'email' => ['required', 'lowercase', 'email'],  
            'reserveplayer'=>['required'],
            'teamleader'=>['required'],
            'password' => ['required', 'confirmed'],
            dd($request)
        ]);
        
        
        $user = User::create([
            
            'name' => $request->name,
            'surname'=>$request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $player = players::create([

            'name'=>$user->name,
            'surname'=>$user->surname,
            'email'=>$user->email,

            'reserveplayer'=>$request->reserveplayer,
            'teamleader'=>$request->teamleader,
            'password'=>$user->password
        ]);

        event(new Registered($user));
        event(new Registered($player));


        Auth::login($user);

        return redirect('../resources\views\auth\login.blade.php');
    }
}
