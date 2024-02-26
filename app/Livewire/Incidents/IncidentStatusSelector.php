<?php

namespace App\Livewire\Incidents;

use Livewire\Component;
use App\Models\IncidentStatus;

class IncidentStatusSelector extends Component
{
    public $selected;
    public $statuses;

    public function mount($selected)
    {
        $this->statuses = IncidentStatus::all();
    }

    public function render()
    {
        return view('livewire.incidents.incident-status-selector');
    }

    public function toggle($id)
    {
        if (in_array($id,$this->selected))
        {
            unset($this->selected[array_search($id,$this->selected)]);
        }
        else
        {
            $this->selected[]=$id;
        }
        $this->dispatch('incident-status-selector-changed', selected: $this->selected);
    }
}
