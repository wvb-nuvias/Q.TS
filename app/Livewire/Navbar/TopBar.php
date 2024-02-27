<?php

namespace App\Livewire\Navbar;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;

class TopBar extends Component
{
    public User $user;

    public function mount() {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.navbar.top-bar');
    }
}
