<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index( $matchweek = null) {

        $query = Game::query();

        if ($matchweek !== null) {
            $query->where('matchweek', $matchweek);

            if (!$query->exists()) {
                abort(404);
            }
        }

        $games = $query->get();

        return view('games.index', [
            'games' => $games
        ]);
    }

    public function show(Game $game, $matchweek) {

        if ($game->matchweek != $matchweek) {
            abort(404);
        }

        return view('games.show', [
           'game' => $game,
           'statistics' => $game->gamePlayerStatistics
        ]);
    }



}
