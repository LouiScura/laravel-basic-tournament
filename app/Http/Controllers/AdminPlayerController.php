<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class AdminPlayerController extends Controller
{
    public function index()
    {
        return view('admin.players.index', [
            'players' => Player::orderBy('first_name', 'asc')->get()
        ]);
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')->with('message', 'Player successfully deleted.');

    }
}
