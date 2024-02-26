<?php

namespace App\Livewire\Devices;

use Livewire\Component;
use App\Models\DeviceType;

class DeviceTypeSelector extends Component
{
    public $selected;
    public $devicetypes;

    public function mount($selected)
    {
        $this->devicetypes = DeviceType::all();
    }

    public function render()
    {
        return view('livewire.devices.device-type-selector');
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
        $this->dispatch('device-type-selector-changed', selected: $this->selected);
    }
}
