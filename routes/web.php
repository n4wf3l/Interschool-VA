<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlayersController;
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

require __DIR__.'/auth.php';
