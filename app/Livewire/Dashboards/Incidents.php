<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;
use App\Models\User;
use App\Models\Incident;
use App\Models\IncidentDetail;

class Incidents extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_INC'))
        {
            return view('livewire.dashboards.incidents');
        }
        else
        {
            return view('errors.403');
        }
    }
}
