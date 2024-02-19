<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incident;
use App\Models\Brand;
use App\Models\User;

class SummaryIncidentsPerBrand extends Component
{
    public $start, $end, $status;
    public $title, $count, $color1, $color2,$icon;
    public User $user;
    public $results;
    public $showview=true;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $tenant_id = $this->user->tenant_id;
        $organizationid = $this->user->organization_id;

        $brands=Brand::select('id','name', 'icon','color1', 'color2')
                        ->where('tenant_id',$tenant_id)
                        ->get();

        $incidents=Incident::where('tenant_id',$tenant_id);

        if ($organizationid!=1) {
            if ($this->user->organization->organization_type_id==4) {
                //reseller

            } else {
                $tmp=$incidents->where('organization_id',$organizationid);
                $incidents=$tmp;
            }
        }

        $tmp=[];
        $start=$this->start.' 00:00:00';
        $end=$this->end.' 00:00:00';

        $total=$incidents->whereBetween('updated_at', [$start,$end])
                         ->get()
                         ->count();

        foreach ($brands as $brand) {
            $tot = Incident::whereBetween('updated_at', [$start,$end])
                         ->where('brand_id',$brand->id)
                         ->get()
                         ->count();

            if ($tot>0) {
                $tmp[]=[
                    "id"   => $brand->id,
                    "icon" => $brand->icon,
                    "name" => $brand->name,
                    "color1" => $brand->color1,
                    "color2" => $brand->color2,
                    "tot"  => $tot,
                    "percentage" => $tot/$total*100
                ];
            }
        }

        $this->results = $tmp;

        if ($this->showview==false)
        {
            return view('livewire.summary-incidents-per-brand-settings');
        }
        else
        {
            return view('livewire.summary-incidents-per-brand');
        }

    }

    public function settings()
    {
        if ($this->showview)
        {
            $this->showview=false;
        }
        else
        {
            session()->flash('success', 'Profile successfully updated.');
            $this->showview=true;
        }
    }
}
