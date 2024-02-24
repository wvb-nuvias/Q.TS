<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Log;
use App\Models\User;
use App\Models\Organization;
use App\Models\OrganizationType;

class Organizations extends Component
{
    public User $user;
    public $selectedtypes = [2,3,4];
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Organizations",
            "log_type"      => 2,
            "message"       => 'Organizations Page is opened.',
            "log_date"      => now()
        ]);
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
