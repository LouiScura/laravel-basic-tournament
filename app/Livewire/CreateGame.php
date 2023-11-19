<?php

namespace App\Livewire;

use App\Livewire\Forms\GameForm;
use App\Models\Team;
use Livewire\Component;

class CreateGame extends Component
{
    public GameForm $form;

    public function render()
    {
        $teams = Team::latest()->get();

        return view('livewire.create-game', [
            'teams' => $teams,
        ]);
    }

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'Match successfully created.');

        return redirect('/admin/games/create');

    }



}
