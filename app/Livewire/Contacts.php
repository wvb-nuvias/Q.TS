<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\Log;
use Livewire\Attributes\On;

class Contacts extends Component
{
    public User $user;
    public $rights;
    public $selectedtypes=[1,2];
    public $mode="list";
    public $isnew=true;
    public $contacttypes=null;
    public $contact_type=null;
    public $contact;

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
        $this->contacttypes=ContactType::all();

        $sel=$this->user->setting("contacttypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Contacts",
            "log_type"      => 2,
            "message"       => 'Contacts Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_CONTACT'))
        {
            if ($this->mode=="list")
                return view('livewire.contacts');
            if ($this->mode=="add")
            {
                $this->contact=new Contact;
                return view('livewire.contact.add');
            }
        }
        else
        {
            return view('errors.403');
        }
    }

    #[On('contact-type-selector-changed')]
    public function updateOrganizationTypeSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","contacttypes")
                        ->first();

        if ($sel)
        {
            $sel->val=implode(",",$selected);
            $sel->save();
        } else {
            UserSetting::create(
                [
                    "tenant_id"      => $this->user->tenant_id,
                    "user_id"       => $this->user->id,
                    "key"           => "contacttypes",
                    "val"           => implode(",",$selected)
                ]
            );
        }

        $this->selectedtypes=$selected;
    }

    public function updateContact()
    {
        $this->switchmode('list');
    }
}
