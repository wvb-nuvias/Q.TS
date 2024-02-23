<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Brand;

class SummarySubscriptionsByBrand extends Component
{
    public $start, $end, $brand;
    public $title, $count, $color1, $color2, $icon, $updown, $updownwhy;
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $tenant_id = $this->user->tenant_id;
        $organizationid = $this->user->organization_id;

        $subscriptions=Subscription::where('tenant_id',$tenant_id);

        if ($organizationid!=1) {
            if ($this->user->organization->organization_type_id==4) {
                $tmp=$subscriptions->where('reseller_id',$organizationid);
                $incidents=$tmp;
            } else {
                $tmp=$subscriptions->where('organization_id',$organizationid);
                $incidents=$tmp;
            }
        }

        $start=$this->start.' 00:00:00';
        $end=$this->end.' 00:00:00';

        $brand=Brand::where('id', $this->brand)->first();

        $this->count=$subscriptions
                            ->where('brand_id',$this->brand)
                            ->get()
                            ->count();
        if ($brand)
        {
            $this->title=$brand->brand_name;
            $this->color1=$brand->brand_color1;
            $this->color2=$brand->brand_color1;
            $this->icon="/".$brand->brand_icon;

        }

        return view('livewire.summary-subscriptions-by-brand');
    }
}
