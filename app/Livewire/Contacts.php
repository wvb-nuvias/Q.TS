<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\Log;

class Contacts extends Component
{
    public User $user;
    public $rights;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Contacts",
            "log_type"      => 2,
            "message"       => 'Contacts Page is opened.',
            "log_date"      => now()
        ]);
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
