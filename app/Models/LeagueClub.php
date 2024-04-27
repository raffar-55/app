<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeagueClub extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function league()
    {
        return $this->belongsTo(League::class);
    }


    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
