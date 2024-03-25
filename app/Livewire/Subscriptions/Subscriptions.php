<?php

namespace App\Livewire\Subscriptions;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Log;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\User;
use App\Models\UserSetting;

class Subscriptions extends Component
{
    public User $user;
    public $rights;
    public $selectedbrand=[1,2,3,4,5,6,7,8];
    public $selectedtypes=[1,2,3,4,5,6];
    public $mode="list";
    public $isnew=true;
    public $subscription=null;
    public $showImportModal;
    public $tenants, $tenant_id;

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    #[On('cancel_import')]
    public function cancelImportModal()
    {
        $this->showImportModal = false;
    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $this->tenant_id=$this->user->tenant_id;

        $this->tenants=Tenant::select('id', 'tenant_name', 'tenant_icon', 'tenant_color')->get()->toArray();

        $sel=$this->user->setting("selectedbrand");
        if ($sel)
        {
            $this->selectedbrand=explode(",",$sel);
        }
        $sel=$this->user->setting("selectedsubscriptiontypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Subscriptions",
            "log_type"      => 2,
            "message"       => 'Subscriptions Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_SUB'))
        {
            if ($this->mode=="add")
            {
                $this->subscription=new Subscription();
                return view('livewire.subscriptions.add');
            }
            return view('livewire.subscriptions.subscriptions');
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

    #[On('subscription-type-selector-changed')]
    public function updateSubscriptionTypeSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","selectedsubscriptiontypes")
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
                    "key"           => "selectedsubscriptiontypes",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedtypes=$selected;
    }

    public function updateSubscription()
    {
        $this->switchmode('list');
    }
}
