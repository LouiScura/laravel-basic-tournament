<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(){
        $teams= Team::all();
        $tournament = Tournament::first();

        return view('standings', [
            'teams' => $teams,
            'tournament' => $tournament

        ]);
    }


    public function show(Team $team){
        return 'Hola';
    }


}
