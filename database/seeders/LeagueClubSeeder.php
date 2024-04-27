<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\LeagueClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeagueClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Premier League', 'clubs' => [
                'Manchester City', 'Liverpool', 'Arsenal', 'MU', 'Chelsea',
            ]],
            ['name' => 'La Liga', 'clubs' => [
                'Real Madrid', 'FCB', 'Athletic Madrid', 'Seville'
            ]],
            ['name' => 'Seria A', 'clubs' => [
                'Inter', 'Milan', 'Juve', 'Roma',
            ]],
            ['name' => 'Bundesliga', 'clubs' => [
                'Bayern', 'Dortmund', 'Wolfsburg', 'Leverkusen',
            ]],
            ['name' => 'league 1', 'clubs' => [
                'PSG', 'Monaco', 'Marsel', 'Lille',
            ]],
        ];

        foreach ($objs as $obj) {
            $league = League::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['clubs'] as $club) {
                LeagueClub::create([
                    'league_id' => $league->id,
                    'name' => $club,
                ]);
            }
        }
    }
}
