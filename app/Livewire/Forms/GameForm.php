<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class GameForm extends Form
{
    #[Rule('required', as: 'Home Team')]
    public $home_team_id  = '';

    #[Rule('required', as: 'Away Team')]
    public $away_team_id = '';

    #[Rule('required|date', as: 'Match date')]
    public $matchDate = '';

    #[Rule('required|numeric', as: 'Match week')]
    public $matchWeek = '';

    #[Rule('required|numeric', as: 'Home Team Score')]
    public $home_team_score = null;

    #[Rule('required|numeric', as: "Away Team Score")]
    public $away_team_score = null ;

    #[Rule('numeric')]
    public $yellow_cards = 0;
    #[Rule('numeric')]
    public $red_cards = 0;

    #[Rule('numeric')]
    public $goals_scored = 0;

    #[Rule('numeric')]
    public $assists = 0;

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
}
