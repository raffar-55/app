<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
