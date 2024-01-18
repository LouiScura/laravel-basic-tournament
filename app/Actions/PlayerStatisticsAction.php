<?php

namespace App\Actions;

use App\Models\Player;

class PlayerStatisticsAction {

    protected $playersWithStatistics;

    public function __construct()
    {
        $this->playersWithStatistics = Player::has('gamePlayerStatistics')->with('gamePlayerStatistics')->get();
    }

    public function getPlayersWithGoalsScored()
    {
        return $this->playersWithStatistics
            ->map(function ($player) {
                $player->total_goals = $player->gamePlayerStatistics
                    ->sum('goals_scored');
                return $player;
            })
            ->filter(function ($player) {
                return $player->total_goals > 0;
            })
            ->sortByDesc('total_goals');
    }

    public function getPlayersWithAssists()
    {
        return $this->playersWithStatistics
            ->map(function ($player) {
                $player->total_assists = $player->gamePlayerStatistics
                    ->sum('assists');
                return $player;
            })
            ->filter(function ($player) {
                return $player->total_assists > 0;
            })
            ->sortByDesc('total_assists');
    }

    public function getPlayersWithYellowCards()
    {
        return $this->playersWithStatistics
            ->map(function ($player) {
                $player->total_yellow_cards = $player->gamePlayerStatistics
                    ->sum('yellow_cards');
                return $player;
            })
            ->filter(function ($player) {
                return $player->total_yellow_cards > 0;
            })
            ->sortByDesc('total_yellow_cards');
    }

    public function getPlayersWithRedCards()
    {
        return $this->playersWithStatistics
            ->map(function ($player) {
                $player->total_red_cards = $player->gamePlayerStatistics
                    ->sum('red_cards');
                return $player;
            })
            ->filter(function ($player) {
                return $player->total_red_cards > 0;
            })
            ->sortByDesc('total_red_cards');
    }
}
