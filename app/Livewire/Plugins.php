<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Plugins extends Component
{
    public User $user;

    public function mount() {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.plugins');
    }

    public function setThemeColor($color)
    {
        $this->user->themecolor=$color;
        $this->user->save();

        return redirect(request()->header('Referer'));
    }

    public function setTheme($theme)
    {
        $this->user->theme=$theme;
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
