<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        $query = Player::query();

        $players = $query->get();

        return view('players.index', [
            'players' => $players,
        ]);
    }
}
