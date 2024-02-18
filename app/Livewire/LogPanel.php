<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class LogPanel extends Component
{
    public User $user;
    public $rights;
    public $title="Logs";
    public $subtitle="Logs of Incidents";
    public $source="Incidents";

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        $this->subtitle="Logs of ".$this->source;

        return view('livewire.log-panel');
    }
}
