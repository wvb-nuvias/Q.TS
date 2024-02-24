<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;
use App\Models\Log;
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

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "Dashboard",
            "source"        => "Incidents",
            "log_type"      => 2,
            "message"       => 'Incidents Dashboard is opened.',
            "log_date"      => now()
        ]);
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
