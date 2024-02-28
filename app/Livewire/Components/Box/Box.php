<?php

namespace App\Livewire\Components\Box;

use Livewire\Component;

class Box extends Component
{
    public $selecteditem=null;
    public $items=[];

    public function render()
    {
        //selecteditem differently
        //anounce selection (with name)
        return view('livewire.components.box.box');
    }
}
