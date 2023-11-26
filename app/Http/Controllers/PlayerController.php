<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Actions\PlayerStatisticsAction;

class PlayerController extends Controller
{
    protected $playerStatisticsAction;

    public function __construct(PlayerStatisticsAction $playerStatisticsAction)
    {
        $this->playerStatisticsAction = $playerStatisticsAction;
    }

    public function index(){

        $playersWithRedCards = $this->playerStatisticsAction->getPlayersWithRedCards();
        $playersWithGoalsScored = $this->playerStatisticsAction->getPlayersWithGoalsScored();
        $playersWithYellowCards = $this->playerStatisticsAction->getPlayersWithYellowCards();
        $playersWithAssists = $this->playerStatisticsAction->getPlayersWithAssists();

        return view('players.index', compact(
            'playersWithRedCards',
            'playersWithGoalsScored',
            'playersWithYellowCards',
            'playersWithAssists')
        );
    }
}
