<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tournament::factory()->createOne([
            'name' => 'Premier League',
            'year' => '2023',
            'start_time' => '2023-12-31',
            'end_time' => '2024-12-31',
        ]);
    }
}
