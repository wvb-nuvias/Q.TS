<?php

namespace App\Livewire\Logs;

use Livewire\Component;
use App\Models\LogType;

class LogTypeSelector extends Component
{
    public $selectedtypes;
    public $logtypes;

    public function mount()
    {
        $this->logtypes = LogType::all();
    }

    public function render()
    {
        return view('livewire.logs.log-type-selector');
    }

    public function toggle($id)
    {
        if (in_array($id,$this->selectedtypes))
        {
            unset($this->selectedtypes[array_search($id,$this->selectedtypes)]);
        }
        else
        {
            $this->selectedtypes[]=$id;
        }
        $this->dispatch('log-type-selector-changed', selected: $this->selectedtypes);
    }
}
