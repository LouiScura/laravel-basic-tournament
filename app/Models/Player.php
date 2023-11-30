<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'first_name',
        'last_name',
        'position',
        'age',
        'avatar'
    ];

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function gamePlayerStatistics() {
        return $this->hasMany(GamePlayerStatistics::class,  'player_id', 'id');
    }

}
