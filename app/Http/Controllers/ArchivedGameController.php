<?php

namespace App\Http\Controllers;

use App\Models\Archived_game;
use App\Http\Requests\StoreArchived_gameRequest;
use App\Http\Requests\UpdateArchived_gameRequest;
use Illuminate\Http\Request;

class ArchivedGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $selectedYear = $request->input('year');
        $years = Archived_game::select('year')->distinct()->pluck('year'); // Get distinct years

        $rankings = Archived_game::when($selectedYear, function ($query) use ($selectedYear) {
            return $query->where('year', $selectedYear);
        })->orderBy('points', 'desc')->get();

        $topscorer = Archived_game::when($selectedYear, function ($query) use ($selectedYear) {
            return $query->where('year', $selectedYear);
        })->orderBy('topscorer_goals', 'desc')->first();


        return view('rankings.archived', compact('rankings', 'years', 'selectedYear', 'topscorer'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArchived_gameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Archived_game $archived_game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archived_game $archived_game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArchived_gameRequest $request, Archived_game $archived_game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archived_game $archived_game)
    {
        //
    }
}
