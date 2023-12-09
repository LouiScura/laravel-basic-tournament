<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlayerStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'player_id',
        'yellow_cards',
        'red_cards',
        'goals_scored',
        'assists'
    ];

    // Define the relationship with Game and Player
    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function player() {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
