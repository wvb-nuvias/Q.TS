<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Integration;
use Livewire\Attributes\On;
use App\Models\User;
use App\Models\Log;

class IntegrationTile extends Component
{
    public User $user;
    public $integration;
    public $tenant_id;
    public $rights;

    public function mount()
    {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
        $this->tenant_id=$this->user->tenant_id;


    }

    public function render()
    {
        return view('livewire.integration-tile');
    }
}
