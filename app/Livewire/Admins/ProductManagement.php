<?php

namespace App\Livewire\Admins;

use Livewire\Component;
use App\Models\User;

class ProductManagement extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_PROD'))
        {
            return view('livewire.admins.product-management');
        }
        else
        {
            return view('errors.403');
        }
    }
}
