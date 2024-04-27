<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function leagueClubs()
    {
        return $this->hasMany(LeagueClub::class)
            ->orderBy('name');
    }


    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
