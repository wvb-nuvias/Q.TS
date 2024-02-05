<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;
use App\Models\AddressType;

class EditAddress extends Component
{
    public Address $address;

    protected function rules()
    {
        return [
            'address.street' => 'required',
            'address.number' => 'required',
            'address.appartement' => '',
            'address.postal' => 'required',
            'address.city' => 'required',
            'address.region' => '',
            'address.country' => 'required',
        ];
    }

    public function mount()
    {

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();
        $this->address->save();
        $this->address->updatelatlng();

        session()->flash('success', 'Address Updated.');
        $this->dispatch('reload_map');
        $this->dispatch('alert_remove');
    }

    public function render()
    {
        return view('livewire.edit-address');
    }
}
