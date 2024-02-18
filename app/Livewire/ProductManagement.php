<?php

namespace App\Livewire;

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
            return view('livewire.product-management');
        }
        else
        {
            return view('errors.403');
        }
    }
}
