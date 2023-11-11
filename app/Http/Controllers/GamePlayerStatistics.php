<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamePlayerStatistics extends Controller
{
    public function show(Game $game, $matchweek) {

        dd($game->gamePlayerStatistics);


        if ($game->matchweek != $matchweek) {
            abort(404);
        }



        return view('games.show-statistics', [
            'game' => $game
        ]);
    }
}
