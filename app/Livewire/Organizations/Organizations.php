<?php

namespace App\Livewire\Organizations;

use Livewire\Component;
use App\Models\Log;
use App\Models\User;
use App\Models\Organization;
use App\Models\OrganizationType;
use Livewire\Attributes\On;
use App\Models\UserSetting;


class Organizations extends Component
{
    public User $user;
    public $selectedtypes = [2,3,4];
    public $rights;
    public $mode="list";
    public $isnew=true;
    public $organization=null;

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $sel=$this->user->setting("organizationtypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Organizations",
            "log_type"      => 2,
            "message"       => 'Organizations Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_ORG'))
        {
            if ($this->mode=="list")
                return view('livewire.organizations.organizations');
            if ($this->mode=="add")
            {
                $this->organization=new Organization;
                return view('livewire.organizations.add');
            }
        }
        else
        {
            return view('errors.403');
        }
    }

    #[On('organization-type-selector-changed')]
    public function updateOrganizationTypeSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","organizationtypes")
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
                    "key"           => "organizationtypes",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedtypes=$selected;
    }

    public function updateOrganization()
    {
        $this->switchmode('list');
    }
}