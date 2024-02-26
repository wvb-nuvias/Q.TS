<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\User;

class SummarySubscriptionsLast extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.components.summary-subscriptions-last');
    }
}
