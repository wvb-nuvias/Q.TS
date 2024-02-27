<?php

namespace App\Livewire\Navbar;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;

class SideBar extends Component
{
    public User $user;
    public UserSetting $userSetting;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

       // dd($this->rights);
    }

    public function render()
    {
        return view('livewire.navbar.side-bar');
    }
}
