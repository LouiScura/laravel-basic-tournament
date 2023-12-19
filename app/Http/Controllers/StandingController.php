<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use App\Models\Team;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(){
        $teams= Team::all();

        return view('standings.index', [
            'standings' => Standing::all(),
        ]);
    }

}
