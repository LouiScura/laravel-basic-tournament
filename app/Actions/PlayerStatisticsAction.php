<?php

namespace App\Actions;

use App\Models\Player;

class PlayerStatisticsAction {
    private function getPlayersWithStatistics(callable $filter)
    {
        $players = Player::has('gamePlayerStatistics')->with('gamePlayerStatistics')->get();

        return $filteredPlayers = $players->filter($filter);
    }

    public function getPlayersWithGoalsScored()
    {
        return $this->getPlayersWithStatistics(function ($player) {
            return $player->gamePlayerStatistics->where('goals_scored', '>', 0)->count() > 0;
        });
    }

    public function getPlayersWithAssists()
    {
        return $this->getPlayersWithStatistics(function ($player) {
            return $player->gamePlayerStatistics->where('assists', '>', 0)->count() > 0;
        });
    }

    public function getPlayersWithYellowCards()
    {
        return $this->getPlayersWithStatistics(function ($player) {
            return $player->gamePlayerStatistics->where('yellow_cards', '>', 0)->count() > 0;
        });
    }

    public function getPlayersWithRedCards()
    {
        return $this->getPlayersWithStatistics(function ($player) {
            return $player->gamePlayerStatistics->where('red_cards', '>', 0)->count() > 0;
        });
    }
}
