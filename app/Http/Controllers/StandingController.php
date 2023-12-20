<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(){
        return view('standings.index', [
            'standings' => Standing::orderBy('points', 'desc')->get(),
        ]);
    }

}
