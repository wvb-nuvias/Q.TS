<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Contact;
use App\Models\ContactType;

class Contacts extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_CONTACT'))
        {
            return view('livewire.contacts');
        }
        else
        {
            return view('errors.403');
        }
    }
}
