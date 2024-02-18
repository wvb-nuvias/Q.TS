<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;
use App\Models\User;
use App\Models\Subscription;

class Subscriptions extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
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
