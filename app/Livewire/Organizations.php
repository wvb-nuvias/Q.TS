<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\OrganizationType;

class Organizations extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_ORG'))
        {
            return view('livewire.organizations');
        }
        else
        {
            return view('errors.403');
        }
    }
}
