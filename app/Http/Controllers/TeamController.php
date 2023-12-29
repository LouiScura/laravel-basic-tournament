<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {

        return view('teams.index', [
            'teams' => Team::all()
        ]);
    }
}
