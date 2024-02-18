<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;
use App\Models\User;
use App\Models\Alert;

class Alerts extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_ALERT'))
        {
            return view('livewire.dashboards.alerts');
        }
        else
        {
            return view('errors.403');
        }
    }
}
