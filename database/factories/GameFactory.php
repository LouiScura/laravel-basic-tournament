<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tournament_id' => Tournament::factory(),
            'home_team_id'   => Team::factory(),
            'away_team_id'   =>  Team::factory(),
            'home_team_score' => $this->faker->numberBetween($min = 0, $max = 6), // Adjust the min and max values as per your requirement
            'away_team_score' => $this->faker->numberBetween($min = 0, $max = 6), // Adjust the min and max values as per your requirement
            'matchweek'       => 1,
        ];
    }
}
