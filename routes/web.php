<?php

use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\TeamController;
use App\Livewire\CreatePlayer;
use App\Livewire\EditPlayer;
use App\Models\Standing;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

// Home
Route::get('/', [GameController::class, 'index'])->name('home');

Route::view('/standings', 'standings.index',
    [
    'standings' => Standing::orderBy('points', 'desc')
    ->orderBy('wins', 'desc')
    ->get()]
)->name('standings');

// Teams
Route::get('/teams', [TeamController::class, 'index'])->name('teams');

// Players
Route::get('/players', [PlayerController::class, 'index'])->name('players');

// Stats
Route::get('/stats', [PlayerStatsController::class, 'index'])->name('stats');

// Admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware'=> 'auth', 'prefix' => 'admin'], function (){
    Route::get('/games/create', [AdminGameController::class, 'create'])->name('games.create')
        ->middleware('team_exists', 'player_exists');

    Route::resource('/teams', AdminTeamController::class);

    Route::get('/players/create', CreatePlayer::class)
        ->name('players.create')
        ->breadcrumbs(fn (Trail $trail) =>
            $trail->parent('players.index')->push('Add player', route('players.create'))
    );

    Route::get('/players/{player}/edit/', EditPlayer::class)
        ->name('players.edit')
        ->breadcrumbs(fn (Trail $trail, $player) =>
            $trail->parent('players.index')->push('Update player', route('players.edit', $player))
        );

    Route::resource('/players', AdminPlayerController::class)->only([
        'index', 'destroy'
    ])->middleware('team_exists');
});

require __DIR__.'/auth.php';
