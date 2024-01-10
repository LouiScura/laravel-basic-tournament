<?php

namespace App\Livewire;

use App\Livewire\Forms\PlayerForm;
use App\Models\Team;
use App\Models\Player;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPlayer extends Component
{
    use WithFileUploads;
    public PlayerForm $form;

    public Player $player;

    public function mount(Player $player): void
    {
        $this->form->setPlayer($player);
    }

    public function save(): void
    {
        $this->form->update();

        session()->flash('message', 'Player successfully updated.');
    }

    public function render(): View
    {
        return view('livewire.edit-player', [
            'teams' => Team::latest()->get()
        ]);
    }
}
