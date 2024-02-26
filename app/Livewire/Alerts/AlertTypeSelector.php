<?php

namespace App\Livewire\Alerts;

use Livewire\Component;
use App\Models\AlertType;

class AlertTypeSelector extends Component
{
    public $selected;
    public $alerttypes;

    public function mount($selected)
    {
        $this->alerttypes = AlertType::all();
    }

    public function render()
    {
        return view('livewire.alerts.alert-type-selector');
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
        $this->dispatch('alert-type-selector-changed', selected: $this->selected);
    }
}
