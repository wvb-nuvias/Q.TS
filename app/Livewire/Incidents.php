<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Incidents extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        return view('livewire.incidents');
    }


}
