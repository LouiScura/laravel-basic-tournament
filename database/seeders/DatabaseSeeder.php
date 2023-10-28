<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Team;
use App\Models\TeamGroup;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a single tournament
        $tournament = Tournament::factory()->createOne();

        // Create 2 groups
        //ps inside the tournament
        $group1 = TeamGroup::create([
            'group_name' => 'Group 1',
        ]);

        $group2 = TeamGroup::create([
            'group_name' => 'Group 2',
        ]);

        // Create 10 teams
        $teams = Team::factory()->count(10)->create();
//
        // Loop through each team and create at least 4 players for them and 2 standings
        foreach ($teams as $team) {
//
//            if (rand(0, 1) === 0) {
//                $group1->teams()->attach($team,
//                    ['tournament_id' => $tournament->id]
//                );
//            } else {
//                $group2->teams()->attach($team,
//                    ['tournament_id' => $tournament->id]
//                );
//            }

            // Randomly assign teams to group 1 or group 2
            $randomGroup = rand(1, 2) === 1 ? $group1 : $group2;

            // Attach the team to the randomly selected group with the tournament ID
            $team->teamGroups()->attach($randomGroup, ['tournament_id' => $tournament->id]);


            $player = Player::factory(3)->create([
                'team_id' => $team->id
            ]);
//
            Standing::factory()->createOne([
                'tournament_id' => $tournament->id,
                'team_id' => $team->id
            ]);
//
            // Select a different random team for the away_team_id
            $awayTeam = $teams->random(1)->first();
            while ($awayTeam->id === $team->id) {
                // Make sure the away team is different from the home team
                $awayTeam = $teams->random(1)->first();
            }
//
            // Create the game with the home_team_id and away_team_id
            Game::factory()->createOne([
                'tournament_id' => $tournament->id,
                'home_team_id' => $team->id,
                'away_team_id' => $awayTeam->id,
            ]);
//
        }

    }
}
