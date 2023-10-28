<?php

namespace Database\Factories;

use App\Models\TeamGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teamName = $this->faker->unique()->word . ' FC';
        $formattedTeamName = ucwords($teamName);

        return [
            'name' => $formattedTeamName,
            'town' => $this->faker->unique()->city,
            'logo' => 'logo.jpg'
        ];
    }
}
