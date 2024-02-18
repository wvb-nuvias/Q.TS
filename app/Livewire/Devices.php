<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Devices extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_DEVICE'))
        {
            return view('livewire.devices');
        }
        else
        {
            return view('errors.403');
        }
    }
}
