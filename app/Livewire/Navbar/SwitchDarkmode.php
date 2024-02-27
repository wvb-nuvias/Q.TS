<?php

namespace App\Livewire\Navbar;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;

Class SwitchDarkMode extends Component
{
    public User $user;

    public function render()
    {
        return view('class SwitchDarkmode');
    }

}
