<?php

namespace App\Http\Controllers;

use App\Actions\PlayerStatisticsAction;
use Illuminate\Http\Request;

class PlayerStatsController extends Controller
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

        return view('stats.index', compact(
                'playersWithRedCards',
                'playersWithGoalsScored',
                'playersWithYellowCards',
                'playersWithAssists')
        );
    }
}
