<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class SummaryAlerts extends Component
{
    public $total=10;
    public $icon="bell";
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.summary-alerts');
    }
}
