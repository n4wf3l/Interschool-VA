<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registerteams', function () {
    return view('registratie_teams');
})->name('registerteams');

// web.php

Route::get('/registerteams', [PlayersController::class, 'index'])->name('registerteams');

Route::get('/myteam', function () {
    return view('myteam');
})->name('myteam');

Route::get('/myteam', [MyTeamController::class, 'index'])->name('myteam');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/contacts', [ContactController::class, 'create'])->name('contacts.create');

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/calendars', [TournamentController::class, 'index'])->name('calendars.index');

Route::post('/generate-schedule', [TournamentController::class, 'createSchedule'])->name('generate-schedule');

Route::post('/reset-tournament', [TournamentController::class, 'resetTournament'])->name('reset-tournament');


Route::get('/rankings', [RankingController::class, 'showRankings'])->name('rankings.ranking'); //show rankings on ranking page

Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');

Route::group(['middleware' => 'admin'], function(){

//ALLE ADMIN ROUTES HIER!

});

require __DIR__ . '/auth.php';

