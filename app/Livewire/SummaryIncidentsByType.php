<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incident;
use App\Models\IncidentType;
use App\Models\IncidentStatus;
use App\Models\User;

class SummaryIncidentsByType extends Component
{
    public $start, $end, $status, $color1, $color2;
    public $title;
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $tenantid = $this->user->tenantid;
        $organisationid = $this->user->organisation_id;

        $incidents=Incident::where('tenantid',$tenantid);

        if ($organisationid!=1) {
            if ($this->user->organisation->organisation_type_id==4) {
                //reseller

            } else {
                $tmp=$incidents->where('organisation',$organisationid);
                $incidents=$tmp;
            }
        }



        return view('livewire.summary-incidents-by-type');
    }
}
