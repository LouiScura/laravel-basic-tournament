<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year',
        'start_time',
        'end_time',
    ];

    public function teams(){
        return $this->belongsToMany(Team::class, 'team_tournament', 'tournament_id', 'team_id');
    }

    public function games(){
        return $this->belongsToMany(Game::class);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }

}
