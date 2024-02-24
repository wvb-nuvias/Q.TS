<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubscriptionType;

class SubscriptionTypeSelector extends Component
{
    public $selected;
    public $types;

    public function mount($selected)
    {
        $this->types = SubscriptionType::all();
    }

    public function render()
    {
        return view('livewire.subscription-type-selector');
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
        $this->dispatch('subscription-type-selector-changed', selected: $this->selected);
    }
}
