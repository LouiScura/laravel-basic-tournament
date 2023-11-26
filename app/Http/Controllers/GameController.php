<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index( $matchweek = null) {

        $query = Game::query();

        $games = $query->get();

        return view('games.index', [
            'games' => $games
        ]);
    }

    public function show(Game $game, $matchweek) {

        return view('games.show', [
           'game' => $game,
           'statistics' => $game->gamePlayerStatistics
        ]);
    }



}
