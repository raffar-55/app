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
                'Manchester City', 'Camry', 'Corolla', 'Highlander', 'Hilux',
            ]],
            ['name' => 'Lexus', 'models' => [
                'ES 350', 'RX 350',
            ]],
            ['name' => 'BMW', 'models' => [
                'M5', 'X5', 'X6', 'X7',
            ]],
            ['name' => 'Mercedes-Benz', 'models' => [
                'S-Class', 'CLS', 'E-Class', 'M-Class',
            ]],
            ['name' => 'Hyundai', 'models' => [
                'Elantra', 'Santa Fe', 'Sonata', 'Tuscon',
            ]],
        ];

        foreach ($objs as $obj) {
            $brand = League::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                LeagueClub::create([
                    'brand_id' => $brand->id,
                    'name' => $model,
                ]);
            }
        }
    }
}
