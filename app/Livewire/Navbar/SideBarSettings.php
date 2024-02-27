<?php

namespace App\Livewire\Navbar;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;

class SideBarSettings extends Component
{
    public User $user;
    public $themeke;

    public function mount() {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.navbar.side-bar-settings');
    }

    public function savesetting($key,$value) {
        $themesetting = UserSetting::where('user_id', $this->user->id)
                        ->where('tenant_id',$this->user->tenant_id)
                        ->where('key',$key)
                        ->first();
        if ($themesetting) {
            $themesetting->val = $value;
            $themesetting->save();
        }

        if ($key!="theme") {
            return redirect(request()->header('Referer'));
        }
    }
}
