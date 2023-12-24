<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminGameController extends Controller
{
    public function create(){

        return view('admin.games.create', [
            'teams' => Team::latest()->get(),
            'players' => Player::all(),
        ]);

    }
}
