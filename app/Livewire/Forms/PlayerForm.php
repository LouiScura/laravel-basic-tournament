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
    public ?Player $player;
    #[Rule('required', as: 'Team')]
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

    public function setPlayer(Player $player): void
    {
        $this->player = $player;
        $this->first_name = $player->first_name;
        $this->last_name = $player->last_name;
        $this->position = $player->position;
        $this->age = $player->age;
    }

    public function store(): void
    {
        $validated = $this->validate();

        if($this->avatar){
            $validated['avatar'] = $this->avatar->store('players', 'public');
        }

        Player::create($validated);

        $this->reset();
    }

    public function update(): void
    {
        $validated = $this->validate();

        if($this->avatar){
            $validated['avatar'] = $this->avatar->store('players', 'public');
        }

        $this->player->update($validated);
    }
}
