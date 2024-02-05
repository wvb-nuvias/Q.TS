<?php

namespace App\Livewire;

use app\Models\User;
use Livewire\Component;

namespace App\Livewire extends Component
{       
    public User $user;
    
    public function render()
    {
        return view('class SwitchDarkmode');
    }
        
}
