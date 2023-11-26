<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Actions\PlayerStatisticsAction;

class PlayerController extends Controller
{
    public function index(){
        return true;
    }
}
