<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminPlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('first_name', 'asc')->filter(request(['team']))->paginate(10);

        return view('admin.players.index', [
            'players' => $players,
            'teams'   => Team::all(),
        ]);

    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')->with('message', 'Player successfully deleted.');

    }
}
