<?php

namespace App\Livewire\Logs;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;
use App\Models\Log;
use Livewire\Attributes\On;
class LogPanel extends Component
{
    public $update;
    public User $user;
    public $rights;
    public $title="Logs";
    public $subtitle="Logs of Incidents";
    public $source="Incidents";
    public $tenant_id;
    public $selectedtypes=[1,2,3,4,5];

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
        $this->tenant_id=$this->user->tenant_id;

        $sel=$this->user->setting("logtypesselection");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }
    }

    public function render()
    {
        $this->subtitle="Logs of ".$this->source;

        return view('livewire.logs.log-panel');
    }

    #[On('log-type-selector-changed')]
    public function updateIncidentStatusSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","logtypesselection")
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
                    "key"           => "logtypesselection",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedtypes=$selected;
    }
}
