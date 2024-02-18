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
        $tenantid = $this->user->tenantid;
        $organisationid = $this->user->organisation_id;

        $subscriptions=Subscription::where('tenantid',$tenantid);

        if ($organisationid!=1) {
            if ($this->user->organisation->organisation_type_id==4) {
                $tmp=$subscriptions->where('reseller_id',$organisationid);
                $incidents=$tmp;
            } else {
                $tmp=$subscriptions->where('organisation_id',$organisationid);
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
            $this->title=$brand->name;
            $this->color1=$brand->color1;
            $this->color2=$brand->color1;
            $this->icon="/img/icon/vendor/".$brand->icon;

        }

        return view('livewire.summary-subscriptions-by-brand');
    }
}
