<?php

namespace App\Http\Controllers;

use App\Models\teams;
use App\Models\players;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return view('admins.index', compact('teams'));
    }
}
