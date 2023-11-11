<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GamePlayerStatistics;
use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StandingController::class, 'index'])->name('home');

// Team
Route::get('/teams/', [TeamController::class, 'index'])->name('teams');
Route::get('/teams/{team:id}', [TeamController::class, 'show']);

// Tournaments
Route::get('/tournaments', function(){

    $tournaments = Tournament::all();

    return view('tournament', [
        'tournaments' => $tournaments
    ]);

})->name('tournaments');

// Games
Route::get('/games', [GameController::class, 'index'])->name('games');
Route::get('/games/game-{game:id}/matchweek-{matchweek}', [GameController::class, 'show']);
Route::get('/games/matchweeks/', function (){
    $matchweeks = Game::distinct('matchweek')->pluck('matchweek');

    return view('games.matchweeks', [
        'matchweeks' => $matchweeks
    ]);
})->name('matchweeks');
Route::get('/games/matchweek/{matchweek}', [GameController::class, 'index'])->name('single_matchweek');
Route::get('/games/{filter?}', function (?string $filter = 'future-games') {

    if ($filter == 'future-games') {
        $games = Game::where('matchdate', '>', now())->get();
        $displayType = 'Future';
        return view('games.index', compact('games', 'displayType'));
    }

    if ($filter == 'past-games') {
        $games = Game::where('matchdate', '<', now())->get();
        $displayType = 'Past';
        return view('games.index', compact('games', 'displayType'));
    }

    return $filter; // Handle other cases or provide a default view
});


// Admin Stuff
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
