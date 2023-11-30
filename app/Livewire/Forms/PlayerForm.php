<?php

namespace App\Livewire\Forms;

use App\Models\Player;
use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
//use Illuminate\Validation\Rule;
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
    #[Validate('image|mimes:png,jpg|max:102400')] // 1MB Max
    public $avatar;

    public function store(): void
    {
        $validated = $this->validate();

        if($this->avatar){
            $validated['avatar'] = $this->avatar->store('players', 'public');
        }

        Player::create($validated);

        $this->reset();
    }
}
