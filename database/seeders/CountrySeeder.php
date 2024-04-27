<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'England',
            'Spain',
            'Italy',
            'Germany',
            'France',
            'Portugal',
            'Argentina',
            'Brazil',
        ];

        foreach ($objs as $obj) {
            Country::create([
                'name' => $obj,
            ]);
        }
    }
}
