<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incident;
use App\Models\User;

class SummaryIncidentsByType extends Component
{
    public $start, $end, $status;
    public $title, $count, $color1, $color2,$icon;
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
                $tmp=$incidents->where('organisation_id',$organisationid);
                $incidents=$tmp;
            }
        }

        $start=$this->start.' 00:00:00';
        $end=$this->end.' 00:00:00';

        if ($this->status==6) {
            $this->count=$incidents->whereBetween('updated_at', [$start,$end])
                                ->where('incident_status_id',$this->status)
                                ->get()
                                ->count();

            $this->title="Closed Incidents";
            $this->color1="orange-500";
            $this->color2="yellow-500";
            $this->icon="file-circle-xmark";
        } elseif ($this->status==4) {
            $this->count=$incidents->whereBetween('updated_at', [$start,$end])
            ->where('incident_status_id',$this->status)
            ->get()
            ->count();

            $this->title="Waiting Incidents";
            $this->color1="emerald-500";
            $this->color2="teal-400";
            $this->icon="file-circle-exclamation";
        } elseif ($this->status<=4) {
            $this->count=$incidents->whereBetween('updated_at', [$start,$end])
            ->where('incident_status_id',1)
            ->orWhere('incident_status_id',2)
            ->orWhere('incident_status_id',3)
            ->get()
            ->count();

            $this->title="Open Incidents";
            $this->color1="blue-500";
            $this->color2="violet-400";
            $this->icon="file-circle-question";
        }

        return view('livewire.summary-incidents-by-type');
    }
}
