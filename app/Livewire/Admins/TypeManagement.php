<?php

namespace App\Livewire\Admins;

use Livewire\Component;
use App\Models\User;

class TypeManagement extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_TYPES'))
        {
            return view('livewire.admins.type-management');
        }
        else
        {
            return view('errors.403');
        }
    }
}
