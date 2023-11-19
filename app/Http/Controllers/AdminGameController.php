<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AdminGameController extends Controller
{
    public function create(){

        $teams = Team::latest()->get();

        return view('admin.games.create', [
            'teams' => $teams
        ]);
    }
}
