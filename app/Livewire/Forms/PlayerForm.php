<?php

namespace App\Livewire\Forms;

use App\Models\Player;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PlayerForm extends Form
{
    #[Rule('required')]
    public $team_id  = '';
    #[Rule('required|min:4|max:10|alpha:ascii', as: 'First Name')]
    public $first_name = '';
    #[Rule('required|min:4|max:10|alpha:ascii', as: 'Last Name' )]
    public $last_name = '';
    #[Rule('required|min:4|max:12|alpha:ascii', as: 'Position')]
    public $position = '';
    #[Rule('required|alpha_num', as: 'Age')]
    public $age = null;


    public function store(): void
    {

        Player::create($this->all());

        $this->reset();
    }
}
