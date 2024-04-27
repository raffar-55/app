<?php

namespace Database\Seeders;

use App\Models\LeagueClub;
use App\Models\Player;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();

        $this->call([
            CountrySeeder::class,
            LeagueClubSeeder::class,
            PositionSeeder::class,
            ExperienceSeeder::class,
        ]);

        Player::factory()
            ->count(1000)
            ->create();
    }
}
