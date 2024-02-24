<?php

namespace App\Livewire;

use App\Models\Log;
use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $gravatarhash;
    public $rights;

    protected function rules()
    {
        return [
            'user.firstname' => 'required',
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,'.$this->user->id,
            'user.phone' => 'max:14'
        ];
    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "User Profile",
            "log_type"      => 2,
            "message"       => 'User Profile Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateprofile()
    {
        $this->validate();
        $this->user->save();

        $this->success();
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_PROFILE'))
        {
            $this->gravatarhash=hash( 'sha256', strtolower( trim( $this->user->email ) ) );
            return view('livewire.user-profile');
        }
        else
        {
            return view('errors.403');
        }
    }

    public function success()
    {
        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "User Profile",
            "log_type"      => 3,
            "message"       => 'User Profile Page is saved.',
            "log_date"      => now()
        ]);

        $this->dispatch('log-update');
        session()->flash('success', 'User Profile successfully updated.');
        $this->dispatch('alert_remove');
    }
}
