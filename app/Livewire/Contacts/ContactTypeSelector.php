<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Models\ContactType;

class ContactTypeSelector extends Component
{
    public $selected;
    public $contacttypes;

    public function mount($selected)
    {
        $this->contacttypes = ContactType::all();
    }

    public function render()
    {
        return view('livewire.contacts.contact-type-selector');
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
        $this->dispatch('contact-type-selector-changed', selected: $this->selected);
    }
}
