<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class TenantManagement extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_TENANT'))
        {
            return view('livewire.admins.tenant-management');
        }
        else
        {
            return view('errors.403');
        }
    }
}
