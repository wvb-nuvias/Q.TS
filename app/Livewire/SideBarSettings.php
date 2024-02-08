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

    public function savesetting($key,$value) {
        $themesetting = UserSetting::where('user_id', $this->user->id)
                        ->where('tenantid',$this->user->tenantid)
                        ->where('key',$key)
                        ->first();
        if ($themesetting) {
            $themesetting->val = $value;
            $themesetting->save();
        }

        //TODO before uncommenting this, need to disable the javascript executed to change to darkmode? and then remove the redirect from setcolor functions
        //return redirect(request()->header('Referer'));

        //TODO after that consider using savesetting function directly in blade sidebar-settings
    }

    public function savetheme($theme) {
        $this->savesetting("theme",$theme);
    }

    public function setcolor1($color) {
        $this->savesetting("themecolor1",$color);
        return redirect(request()->header('Referer'));
    }

    public function setcolor2($color) {
        $this->savesetting("themecolor2",$color);
        return redirect(request()->header('Referer'));
    }
}
