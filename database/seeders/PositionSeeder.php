<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'GK',
            'CB',
            'RB',
            'LB',
            'DM',
            'RM',
            'CM',
            'RW',
            'LW',
            'CF',
        ];

        foreach ($objs as $obj) {
            Position::create([
                'name' => $obj,
            ]);
        }
    }
}
