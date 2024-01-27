<?php

namespace App\Console\Commands;

use App\Models\Player;
use Illuminate\Console\Command;

class PlayerGoalsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:player-goals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get players info and goals scored by the player';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line("Available Players:");
        $this->table(['ID', 'First Name', 'Position'], Player::all(['id', 'first_name', 'position']));

        // Ask the user
        $playerId = $this->ask('Enter the ID of the player to get the total goals scored');

        // Validate the player ID
        $player = Player::find($playerId);

        if (!$player) {
            $this->error('Trying something funny huh. Player not found!!');
            return;
        }

        $goals_scored =  $player->gamePlayerStatistics->sum('goals_scored');

        if ($goals_scored > 0) {
            $this->info('Total goals scored is: ' . $goals_scored);
        } else {
            $this->alert('The player has not scored yet!');
        }

    }
}
