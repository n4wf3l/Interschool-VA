<?php

namespace App\Http\Controllers;

use App\models\players;
use App\Models\User;
use App\Http\Requests\StoreusersRequest;
use App\Http\Requests\UpdateusersRequest;

class UsersController extends Controller
{
    
    /**
     * user in de db opslaan
     */

     
    public function store(StoreusersRequest $request)
    {
        //validatie van de data
        $request->validate([
            'name'=> 'required|string',
            'surname'=> 'required|string',
            'email'=> 'required|email|unique:user',
            'password'=> 'required|string',
            'reserveplayer' =>'required',
            'teamleader' =>'required',
        ]);

        //instantie maken van user
        $user = new user();

        //input waarden van de form aan de model attributes assignen
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->email = $request->input('email');
            $user->password = \bcrypt($request->input('password'));
            
            $user-> save();

            $player = new players();

            $player->name = $user->name;
            $player->surname = $user->surname;
            $player->email = $user->email;
            $player->reserveplayer->input('reserveplayer');
            $player->teamleader->input('teamleader');

            $player-> save();

        return \redirect('../resources\views\auth\login.blade.php');

    }

    /**
     * Display the specified resource.
     */
    public function show(user $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateusersRequest $request, user $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $users)
    {
        //
    }
}
