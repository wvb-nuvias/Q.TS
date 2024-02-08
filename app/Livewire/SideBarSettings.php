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

    public function savetheme($gg) {
        $themesetting = UserSetting::where('user_id', $this->user->id)
                        ->where('tenantid',$this->user->tenantid)
                        ->where('key','theme')
                        ->first();
        if ($themesetting) {
            $themesetting->val = $gg;
            $themesetting->save();
        }
    }

    public function setThemeColor($color)
    {
        $this->user->themecolor=$color;
        $this->user->save();

        return redirect(request()->header('Referer'));
    }

    public function setSideBarBackground($theme)
    {
        $this->user->themesidebar=$theme;
        $this->user->save();

        return redirect(request()->header('Referer'));
    }
}
