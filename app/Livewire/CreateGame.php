<?php

namespace App\Livewire;

use App\Livewire\Forms\GameForm;
use App\Models\Game;
use App\Models\Team;
use Livewire\Component;

class CreateGame extends Component
{
    public GameForm $form;

    // All players
    public $players;

    // Player from form
    public $player;

    public $teams;

    public function mount($players, $teams)
    {
        $this->players = $players;
        $this->teams = $teams;
    }

    public function render()
    {
        return view('livewire.create-game');
    }

    public function save()
    {
        // Create a new Game with data from Livewire form
        $game = Game::create($this->form->all());


        if($this->player) {
            // Access the relationship and create associated GamePlayerStatistics
            $game->gamePlayerStatistics()->create([
                'game_id'   => $game->id,
                'player_id' => $this->player,
                'yellow_cards' => $this->form->yellow_cards,
                'red_cards' => $this->form->red_cards,
                'goals_scored' => $this->form->goals_scored,
                'assists' => $this->form->assists,
            ]);
        }

        session()->flash('message', 'Match successfully created.');

        return redirect('/admin/games/create');

    }
}
