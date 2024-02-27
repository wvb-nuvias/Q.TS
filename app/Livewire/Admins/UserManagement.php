<?php

namespace App\Livewire\Admins;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_USER'))
        {
            return view('livewire.admins.user-management');
        }
        else
        {
            return view('errors.403');
        }
    }
}
