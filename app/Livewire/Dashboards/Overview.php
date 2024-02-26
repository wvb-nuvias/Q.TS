<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;
use App\Models\User;

class Overview extends Component
{
    public User $user;

    public function mount() {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.dashboards.overview');
    }
}
