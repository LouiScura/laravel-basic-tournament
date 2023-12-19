<?php

namespace App\Observers;

use App\Models\Game;
use App\Models\Standing;

class GameObserver
{
    public function created(Game $game)
    {
        $homeTeamId = $game->home_team_id;
        $awayTeamId = $game->away_team_id;

        if (!is_null($game->home_team_score) || !is_null($game->away_team_score)) {

            $winnerTeamId = $this->determineWinner($game);

            $this->updateStandings($homeTeamId, $awayTeamId, $winnerTeamId);
        }
    }
//
    private function determineWinner(Game $game)
    {
        $homeTeamGoals = $game->home_team_score ?? null;
        $awayTeamGoals = $game->away_team_score ?? null;

        if ($homeTeamGoals > $awayTeamGoals) {
            return $game->home_team_id;
        } elseif ($awayTeamGoals > $homeTeamGoals) {
            return $game->away_team_id;
        } else {
            // It's a draw
            return null;
        }
    }

    private function updateStandings($winnerTeamId, $homeTeamId, $awayTeamId)
    {
        $teamsToUpdate = array_filter([$homeTeamId, $awayTeamId, $winnerTeamId]);

        if ($winnerTeamId !== null) {
            // Update standings for a match with a winner
            Standing::where('team_id', $winnerTeamId)->increment('points', 3);
            Standing::where('team_id', $winnerTeamId)->increment('wins');
            Standing::where('team_id', $homeTeamId == $winnerTeamId ? $awayTeamId : $homeTeamId)->increment('losses');
        } else {
            // Update standings for a draw
            // You might want to adjust the points distribution for a draw
            Standing::where('team_id', $homeTeamId)->increment('points', 1);
            Standing::where('team_id', $awayTeamId)->increment('points', 1);
            Standing::whereIn('team_id', [$homeTeamId, $awayTeamId])->increment('draws');
        }

    }
}
