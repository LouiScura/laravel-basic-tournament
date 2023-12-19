<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'team_id',
        'wins',
        'losses',
        'draws',
        'goals_scored',
        'goals_conceded',
        'points'
    ];

    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }
}
