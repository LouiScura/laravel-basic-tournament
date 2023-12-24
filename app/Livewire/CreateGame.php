<?php

namespace App\Livewire;

use App\Livewire\Forms\GameForm;
use App\Models\Team;
use Livewire\Component;

class CreateGame extends Component
{
    public GameForm $form;

    public $players;

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
        $this->form->store();

        session()->flash('message', 'Match successfully created.');

        return redirect('/admin/games/create');

    }

}
