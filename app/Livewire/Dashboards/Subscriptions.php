<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;
use App\Models\Log;
use App\Models\User;
use App\Models\Subscription;

class Subscriptions extends Component
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
            "source"        => "Subscriptions",
            "log_type"      => 2,
            "message"       => 'Subscriptions Dashboard is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_SUB'))
        {
            return view('livewire.dashboards.subscriptions');
        }
        else
        {
            return view('errors.403');
        }
    }
}
