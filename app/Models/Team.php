<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tournaments(){
        return $this->belongsToMany(Tournament::class, 'team_tournament', 'team_id', 'tournament_id');
    }

    public function teamGroups()
    {
        return $this->belongsToMany(TeamGroup::class, 'team_group_team', 'team_id', 'team_group_id')
            ->withPivot('tournament_id')
            ->withTimestamps();
    }

    public function players(){
        return $this->hasMany(Player::class);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }

    public function homeGames()
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayGames()
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }

}
