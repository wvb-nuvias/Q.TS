<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class TypeManagement extends Component
{
    public User $user;

    public function mount() {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.type-management');
    }
}
