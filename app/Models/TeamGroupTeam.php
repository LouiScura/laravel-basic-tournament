<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamGroupTeam extends Model
{
    use HasFactory;

    // Explicitly set the table name
    protected $table = 'team_group_team';

    public function tournaments() {
        return $this->belongsToMany(Tournament::class);
    }

    public function teams() {
        return $this->belongsToMany(Team::class);
    }
}
