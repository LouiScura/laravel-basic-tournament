<?php

namespace App\Livewire\Forms;

use App\Models\Game;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Fluent;

class GameForm extends Form
{
    #[Rule('required')]
    public $home_team_id  = '';
    #[Rule('required')]
    public $away_team_id = '';
    #[Rule('required|date')]
    public $matchDate = '';
    #[Rule('required|numeric')]
    public $matchWeek = '';
    #[Rule('required|numeric')]
    public $home_team_score = null;
    #[Rule('required|numeric')]
    public $away_team_score = null ;

    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->sometimes('home_team_score', 'required|numeric', function ($input) {
                return $input->matchDate < now();
            });

            $validator->sometimes('away_team_score', 'required|numeric', function ($input) {
                return $input->matchDate < now();
            });
        });
    }

    public function store()
    {

        Game::create($this->all());

        $this->reset();
    }
}
