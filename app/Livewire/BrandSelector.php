<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;

class BrandSelector extends Component
{
    public $selected=[0,1,2,3,4,5,6,7,8];
    public $brands;

    public function render()
    {
        $this->brands = Brand::all();

        return view('livewire.brand-selector');
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
        $this->dispatch('brand-selector-changed', selected: $this->selected);
    }
}
