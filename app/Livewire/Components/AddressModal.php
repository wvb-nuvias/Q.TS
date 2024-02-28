<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Integration;
use App\Models\Address;
use App\Models\User;
use App\Models\AddressType;
use App\Models\UserSetting;
use Livewire\Attributes\On;

class AddressModal extends Component
{
    public bool $showAddressSelectorModal, $showConfirmImportModal = false;
    public User $user;
    public $rights;
    public $title;
    public $mode="Add";
    public $address;
    public $addresses,$address_types,$address_type_id;

    #[On('show-dialog-address')]
    public function openAddressSelectorModal()
    {
        $this->showAddressSelectorModal = true;
    }

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function cancel() {
        $this->showAddressSelectorModal = false;
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $this->address_types=AddressType::where('tenant_id',$this->user->tenant_id)
            ->get()
            ->toArray();
    }

    public function render()
    {
        $this->title=$this->mode." Address";
        if($this->mode=="Add")
        {
            $this->address=new Address();
        }

        return view('livewire.components.address-modal');
    }

    public function save() {

    }
}
