<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrganizationType;

class OrganizationTypeSelector extends Component
{
    public $selected;
    public $types;

    public function mount($selected)
    {
        $this->types = OrganizationType::all();
    }

    public function render()
    {
        return view('livewire.organization-type-selector');
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
        $this->dispatch('organization-type-selector-changed', selected: $this->selected);
    }
}
