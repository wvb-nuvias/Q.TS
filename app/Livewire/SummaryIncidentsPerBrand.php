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

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $tenantid = $this->user->tenantid;
        $organisationid = $this->user->organisation_id;

        $brands=Brand::select('id','name', 'icon','color1', 'color2')
                        ->where('tenantid',$tenantid)
                        ->get();

        $incidents=Incident::where('tenantid',$tenantid);

        if ($organisationid!=1) {
            if ($this->user->organisation->organisation_type_id==4) {
                //reseller

            } else {
                $tmp=$incidents->where('organisation_id',$organisationid);
                $incidents=$tmp;
            }
        }

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

        return view('livewire.summary-incidents-per-brand');
    }
}
