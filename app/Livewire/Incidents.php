<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use App\Models\UserSetting;

class Incidents extends Component
{
    public User $user;
    public $rights;
    public $selectedstatus=[1,2,3];
    public $selectedbrand=[1,2,3,4,5,6,7,8];

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $sel=$this->user->setting("selectedbrand");
        if ($sel)
        {
            $this->selectedbrand=explode(",",$sel);
        }
        $sel=$this->user->setting("incidentstatuses");
        if ($sel)
        {
            $this->selectedstatus=explode(",",$sel);
        }
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_INC'))
        {


            return view('livewire.incidents');
        }
        else
        {
            return view('errors.403');
        }
    }

    #[On('incident-status-selector-changed')]
    public function updateIncidentStatusSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","incidentstatuses")
                        ->first();

        if ($sel)
        {
            $sel->val=implode(",",$selected);
            $sel->save();
        } else {
            UserSetting::create(
                [
                    "tenant_id"      => $this->user->tenant_id,
                    "user_id"       => $this->user->id,
                    "key"           => "incidentstatuses",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedstatus=$selected;
    }

    #[On('brand-selector-changed')]
    public function updateBrandSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","selectedbrand")
                        ->first();

        if ($sel)
        {
            $sel->val=implode(",",$selected);
            $sel->save();
        } else {
            UserSetting::create(
                [
                    "tenant_id"      => $this->user->tenant_id,
                    "user_id"       => $this->user->id,
                    "key"           => "selectedbrand",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedbrand=$selected;
    }
}
