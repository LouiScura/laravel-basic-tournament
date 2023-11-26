<?php

namespace App\Livewire;

use App\Livewire\Forms\PlayerForm;
use App\Models\Team;
use Illuminate\View\View;
use Livewire\Component;

class CreatePlayer extends Component
{
    public PlayerForm $form;

    public bool $message = false;

    public function save(): void
    {
        $this->validate();

        $this->form->store();

        session()->flash('message', 'Player successfully created.');
    }

    public function render(): View
    {

        $teams = Team::latest()->get();

        return view('livewire.create-player', [
            'teams' => $teams
        ]);
    }
}
