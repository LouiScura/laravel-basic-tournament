<?php

namespace Database\Factories;

use App\Models\Team;
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
        return [
            'team_id'   =>  Team::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'position' => $this->faker->word,
            'age' => $this->faker->numberBetween($min = 18, $max = 30), // Adjust the min and max values as per your requirement
            'goals_scored' => $this->faker->numberBetween($min = 0, $max = 6), // Adjust the min and max values as per your requirement
        ];
    }
}
