<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamGroup extends Model
{
    use HasFactory;

    public function teams(){
        return $this->belongsToMany(Team::class, 'team_group_team', 'team_group_id', 'team_id')
            ->withPivot('tournament_id')
            ->withTimestamps();
    }

}
