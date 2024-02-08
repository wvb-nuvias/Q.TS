<?php

namespace App\Livewire;

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
        return view('livewire.side-bar-settings');
    }

    public function savetheme($theme) {
        $themesetting = UserSetting::where('user_id', $this->user->id)
                        ->where('tenantid',$this->user->tenantid)
                        ->where('key','theme')
                        ->first();
        if ($themesetting) {
            $themesetting->val = $theme;
            $themesetting->save();
        }
    }

    public function setcolor1($color)
    {
        $themesetting = UserSetting::where('user_id', $this->user->id)
                        ->where('tenantid',$this->user->tenantid)
                        ->where('key','themecolor1')
                        ->first();
        if ($themesetting) {
            $themesetting->val = $color;
            $themesetting->save();
        }

        return redirect(request()->header('Referer'));
    }

    public function setcolor2($color)
    {
        $themesetting = UserSetting::where('user_id', $this->user->id)
                        ->where('tenantid',$this->user->tenantid)
                        ->where('key','themecolor2')
                        ->first();
        if ($themesetting) {
            $themesetting->val = $color;
            $themesetting->save();
        }

        return redirect(request()->header('Referer'));
    }
}
