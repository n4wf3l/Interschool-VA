<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ArchivedGameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use \App\Http\Middleware\AdminMiddleware;


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

    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});





// web.php

Route::get('/registerteams', function () {

    if (auth()->check()) {

        return redirect()->route('dashboard');
    }


    return app(PlayersController::class)->index();

})->name('registerteams');



Route::get('/myteam', function () {
    return view('myteam');
})->name('myteam');

Route::get('/myteam', [MyTeamController::class, 'index'])->name('myteam');
Route::post('/myteam', [MyTeamController::class, 'updateTeamName'])->name('updateTeamName');

Route::post('/myteam/update', [MyTeamController::class, 'updatePlayerGoals'])->name('updatePlayerGoals');
Route::post('/myteam/saveTemporaryScores/{gameId}', [MyTeamController::class, 'saveTemporaryScores'])
    ->name('saveTemporaryScores');


Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'showTeams'])->name('dashboard');
});



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

Route::get('/about', function () {
    return view('about');
});


Route::middleware('admin')->group(function () {

    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::post('/send-message', [AdminController::class, 'sendMessageToAllUsers'])->name('send-message');
    Route::post('/notify-team-leaders/{game}', [AdminController::class, 'unsolvedScoreNotifier'])->name('notify-team-leaders');
    Route::post('/admins/games/{game}/save-scores', [AdminController::class, 'saveDefinitiveScores'])->name('admins.save-scores');

});

Route::get('/rankings/archived', [ArchivedGameController::class, 'index'])->name('rankings.archived');








require __DIR__ . '/auth.php';

