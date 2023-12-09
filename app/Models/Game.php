<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'home_team_id',
        'away_team_id',
        'matchWeek',
        'matchDate',
        'home_team_score',
        'away_team_score',
    ];

    public function tournaments(){
        return $this->belongsTo(Tournament::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function gamePlayerStatistics() {
        return $this->hasMany(GamePlayerStatistics::class);
    }
}
