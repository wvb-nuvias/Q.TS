<?php

namespace App\Livewire\Components\Box;

use Livewire\Component;

class BoxItem extends Component
{
    public $item;

    public function render()
    {
        return view('livewire.components.box.box-item');
    }
}
