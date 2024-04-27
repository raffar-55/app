<?php

namespace Database\Factories;

use App\Models\LeagueClub;
use App\Models\Position;
use App\Models\Country;
use App\Models\User;
use App\Models\Experience;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $country = Country::inRandomOrder()->first();
        $leagueClub = LeagueClub::with('league')->inRandomOrder()->first();
        $experience = Experience::inRandomOrder()->first();
        $position = Position::inRandomOrder()->first();
        //$createdAt = fake()->dateTimeBetween('-6 months', 'now');
        return [
            'user_id' => $user->id,
            'country_id' => $country->id,
            'league_id' => $leagueClub->league_id,
            'league_club_id' => $leagueClub->id,
            'experience-id' => $experience->id,
            'position_id' => $position->id,
            'title' => $experience->name . ' ' . $position->name . ' ' . $leagueClub->brand->name . ' ' . $leagueClub->name,
            'body' => fake()->paragraph(rand(1, 3)),
            'price' => fake()->numberBetween(100, 500) * 1000,
            // 'credit' => fake()->boolean(10),
            //'exchange' => fake()->boolean(30),
            // 'created_at' => Carbon::parse($createdAt),
            // 'updated_at' => Carbon::parse($createdAt)->addDays(rand(0, 6))->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
        ];
    }
}
