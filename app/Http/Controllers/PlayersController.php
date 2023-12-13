<?php

namespace App\Http\Controllers;

use App\Models\players;
use App\Http\Requests\StoreplayersRequest;
use App\Http\Requests\UpdateplayersRequest;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreplayersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(players $players)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(players $players)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplayersRequest $request, players $players)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(players $players)
    {
        //
    }
}
