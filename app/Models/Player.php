<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function league()
    {
        return $this->belongsTo(League::class);
    }


    public function leagueClub()
    {
        return $this->belongsTo(LeagueClub::class);
    }


    public function position()
    {
        return $this->belongsTo(Position::class);
    }


    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
