<?php

use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Game;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [GameController::class, 'index'])->name('home');

// Teams
Route::group(['prefix' => 'teams'], function (){
    Route::get('/', [TeamController::class, 'index'])->name('teams');
    Route::get('/{team:id}', [TeamController::class, 'show']);
});

// Games
Route::group(['prefix' => 'games'], function (){
    Route::get('/', [GameController::class, 'index'])->name('games');
    Route::get('/{game:id}/week-{matchweek}', [GameController::class, 'show']);
});

// Players
Route::get('/players', [PlayerController::class, 'index'])->name('players');

// Admin Stuff
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware'=> 'auth', 'prefix' => 'admin'], function (){
    Route::post('/teams', [AdminTeamController::class, 'store']);
    Route::get('/teams/create', [AdminTeamController::class, 'create'])->name('create_team');
    Route::get('/games/create', [AdminGameController::class, 'create'])->name('create_match');
    Route::view('/players/create', 'admin.players.create')->name('create_player');
});

require __DIR__.'/auth.php';
