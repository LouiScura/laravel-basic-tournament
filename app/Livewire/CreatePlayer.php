<?php

namespace App\Livewire;

use App\Livewire\Forms\PlayerForm;
use App\Models\Team;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePlayer extends Component
{
    use WithFileUploads;

    public PlayerForm $form;
    public function save(): void
    {
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
