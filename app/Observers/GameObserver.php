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

    private function updateStandings($homeTeamId, $awayTeamId, $winnerTeamId)
    {
        if ($winnerTeamId !== null) {

            // Update standings for a match with a winner
            Standing::where('team_id', $winnerTeamId)->increment('points', 3);

            Standing::where('team_id', $winnerTeamId)->increment('wins');

            // Determine the losing team's ID
            $losingTeamId = ($homeTeamId == $winnerTeamId) ? $awayTeamId : $homeTeamId;

            Standing::where('team_id', $losingTeamId)->increment('losses');
        } else {
            // Update standings for a draw
            Standing::where('team_id', $homeTeamId)->increment('points', 1);
            Standing::where('team_id', $awayTeamId)->increment('points', 1);
            Standing::whereIn('team_id', [$homeTeamId, $awayTeamId])->increment('draws');
        }
    }

}
