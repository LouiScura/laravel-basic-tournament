<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Standing>
 */
class StandingFactory extends Factory
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
            'team_id'   =>  Team::factory(),
            'wins' => $this->faker->numberBetween($min = 0, $max = 16),
            'losses' => $this->faker->numberBetween($min = 0, $max = 16),
            'draws' => $this->faker->numberBetween($min = 0, $max = 16),
            'goals_scored' => $this->faker->numberBetween($min = 0, $max = 16),
            'goals_conceded' => $this->faker->numberBetween($min = 0, $max = 16),
            'points' => $this->faker->numberBetween($min = 1, $max = 25)
        ];
    }
}
