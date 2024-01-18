<?php

namespace App\Livewire;

use App\Livewire\Forms\GameForm;
use App\Models\Game;
use App\Models\Team;
use App\Models\Player;
use Livewire\Component;

class CreateGame extends Component
{
    public GameForm $form;

    // All players
    public $players;

    // Player from form
    public $player;

    public $teams;

    public $new_players;
    public function mount($players, $teams)
    {
        $this->players = $players;
        $this->teams = $teams;
        $this->new_players = []; // An array to hold player stats, initially empty
    }

    public function render()
    {
        return view('livewire.create-game', [
            'teams' => Team::latest()->get()
        ]);
    }

    public function save()
    {
        $validated = $this->form->validate();

        // Create a new Game with data from Livewire form
        $game = Game::create([
            'home_team_id' => $validated['home_team_id'],
            'away_team_id' => $validated['away_team_id'],
            'matchWeek' => $validated['matchWeek'],
            'matchDate' => $validated['matchDate'],
            'home_team_score' => $validated['home_team_score'],
            'away_team_score' => $validated['away_team_score'],
        ]);

        foreach ($this->new_players as $playerStats) {
            $game->gamePlayerStatistics()->create([
                'game_id' => $game->id,
                'player_id' => $this->players->first()->id ?? null,
                'yellow_cards' => $playerStats['yellow_cards'],
                'red_cards' => $playerStats['red_cards'],
                'goals_scored' => $playerStats['goals_scored'],
                'assists' => $playerStats['assists'],
            ]);
        }

        session()->flash('message', 'Match successfully created.');

        return redirect('/admin/games/create');

    }
}
