<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Log;
use App\Models\User;
use App\Models\Device;
use App\Models\UserSetting;

class Devices extends Component
{
    public User $user;
    public $rights;
    public $selectedbrand=[1,2,3,4,5,6,7,8];
    public $selectedtypes=[1,2,3,4,5,6,7,8,9];
    public $mode="list";
    public $isnew=true;
    public $device=null;

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

        $sel=$this->user->setting("selecteddevicetypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Devices",
            "log_type"      => 3,
            "message"       => 'Devices Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_DEVICE'))
        {
            if ($this->mode=="list")
                return view('livewire.devices');
            if ($this->mode=="add")
            {
                $this->device=new Device;
                return view('livewire.device.add');
            }
        }
        else
        {
            return view('errors.403');
        }
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

    #[On('device-type-selector-changed')]
    public function updateDeviceTypeSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","selecteddevicetypes")
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
                    "key"           => "selecteddevicetypes",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedtypes=$selected;
    }

    public function updateDevice()
    {
        $this->switchmode('list');
    }
}
