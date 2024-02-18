<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organisation;
use App\Models\OrganisationType;

class Organisations extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_ORG'))
        {
            return view('livewire.organisations');
        }
        else
        {
            return view('errors.403');
        }
    }
}
