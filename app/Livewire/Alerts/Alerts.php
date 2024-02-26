<?php

namespace App\Livewire\Alerts;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Log;
use App\Models\Alert;
use App\Models\User;
use App\Models\UserSetting;

class Alerts extends Component
{
    public User $user;
    public $rights;
    public $selectedtypes=[1,2,3,4,5];
    public $selectedbrand=[1,2,3,4,5,6,7,8];
    public $newid;
    public $mode="list";
    public $isnew=true;
    public $incident=null;
    public $alert=null;

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $sel=$this->user->setting("selectedbrand");
        if ($sel)
        {
            $this->selectedbrand=explode(",",$sel);
        }

        $sel=$this->user->setting("selectedalerttypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Alerts",
            "log_type"      => 2,
            "message"       => 'Alerts Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_ALERT'))
        {
            if ($this->mode=="list")
                return view('livewire.alerts.alerts');
            if ($this->mode=="add")
            {
                $this->alert=new Alert;
                return view('livewire.alerts.add');
            }
        }
        else
        {
            return view('errors.403');
        }
    }

    #[On('alert-type-selector-changed')]
    public function updateAlertTypeSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","selectedalerttypes")
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
                    "key"           => "selectedalerttypes",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedtypes=$selected;
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

    public function updateAlert()
    {
        $this->switchmode('list');
    }
}
