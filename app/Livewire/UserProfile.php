<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;

    protected function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,'.$this->user->id,
            'user.phone' => 'max:14',
            'user.about' => 'max:150'
        ];
    }

    public function mount() {
        $this->user = auth()->user();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();
        $this->user->save();

        session()->flash('success', 'Profile successfully updated.');
        $this->dispatch('alert_remove');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
