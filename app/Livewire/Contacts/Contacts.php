<?php

namespace App\Livewire\Contacts;

use App\Livewire\Organizations\Organizations;
use Livewire\Component;
use App\Models\User;
use App\Models\UserSetting;
use App\Models\Address;
use App\Models\Organization;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\Log;
use App\Models\Language;
use App\Models\Job;
use Livewire\Attributes\On;
use App\Models\Tenant;

class Contacts extends Component
{
    public bool $showImportModal, $showConfirmImportModal = false;
    public User $user;
    public $rights;
    public $selectedtypes=[1,2];
    public $mode="list";
    public $isnew=true;
    public $contacttypes=null;
    public $contact_type=null;
    public $contact;
    public $address,$tenants=null,$tenant_id;
    public $organizations;
    public $organization_id;
    public $jobs,$languages;

    protected $rules = [
        'organization.tenant_id' => 'required',
        'contact.customer_id' => 'required',
        'contact.contact_type_id' => 'required',
        'contact.job_id' => 'required',
        'contact.lastname' => 'required',
        'contact.firstname' => 'required',
        'contact.language' => 'required',
    ];

    #[On('edit_contact')]
    public function edit($rowId): void
    {
        $this->organization_id=$rowId;
        $this->switchmode('edit');
    }

    #[On('view_contact')]
    public function view($rowId): void
    {
        $this->organization_id=$rowId;
        $this->switchmode('view');
    }

    public function openImportModal()
    {
        $this->dispatch('show-dialog-imports');
    }

    public function openAddressSelectorModal()
    {
        $this->dispatch('show-dialog-address');
    }

    public function cancel() {
        $this->switchmode('list');
    }

    public function cancelImportModal()
    {
        $this->showImportModal = false;
    }

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $this->languages=Language::select('language_code', 'language_name', 'language_flag')
            ->get()
            ->toArray();

        $sel=$this->user->setting("contacttypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        $this->jobs=Job::where('tenant_id',$this->user->tenant_id)
            ->select('id','name', 'source')
            ->get()
            ->toArray();

        $this->organizations=Organization::join('organization_types', function ($organization_types) {
                $organization_types->on('organization_type_id', '=', 'organization_types.id');
            })
            ->where('organizations.tenant_id',$this->user->tenant_id)
            ->select('organizations.id','number','name', 'organization_type_id', 'organization_type_name', 'organization_type_icon', 'organization_type_color')
            ->get()
            ->toArray();

        $this->contacttypes=ContactType::where('tenant_id',$this->user->tenant_id)
            ->whereIn('id',$this->selectedtypes)
            ->select('id','contact_type_name','contact_type_icon', 'contact_type_color')
            ->get()
            ->toArray();

        //$this->contacttypes=ContactType::all();

        $this->tenant_id=$this->user->tenant_id;

        $this->tenants=Tenant::select('id', 'tenant_name', 'tenant_icon', 'tenant_color')->get()->toArray();

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

    public function render()
    {
        if ($this->user->hasright('VIEW_CONTACT'))
        {
            if ($this->mode=="list")
                return view('livewire.contacts.contacts');
            if ($this->mode=="add")
            {
                $this->contact=new Contact;
                $this->address=new Address;
                return view('livewire.contacts.add');
            }
            if ($this->mode=="edit")
            {
                $this->contact=Contact::where('id', $this->contact_id)->first();
                $this->address=$this->contact->address;
                return view('livewire.contacts.edit');
            }
            if ($this->mode=="view")
            {
                $this->contact=Contact::where('id', $this->contact_id)->first();
                $this->address=$this->contact->address;
                return view('livewire.contacts.view');
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

    #[On('organization-address-changed')]
    public function address_changed($address)
    {
        $this->address=Address::create([
            "tenant_id" => $this->tenant_id,
            "address_type_id" => $address["address_type_id"],
            "ordinal" => 1,                 // find way out to check if it is second address for same org
            "street" => $address["street"],
            "number" => $address["number"],
            "apartment" => $address["apartment"],
            "postal" => $address["postal"],
            "city" => $address["city"],
            "region" => $address["region"],
            "country" => $address["country"]
        ]);

        $this->address->updatelatlng();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Organizations",
            "log_type"      => 2,
            "message"       => 'New address has been created.',
            "log_date"      => now()
        ]);

        $this->cancel();
    }

    public function saveContact()
    {
        $newcon=Contact::create([
            "tenant_id" => $this->tenant_id,
            "address_id" => $this->address->address_id,
            "contact_type_id" => $this->contact->contact_type_id,
            "lastname" => $this->contact->lastname,
            "firstname" => $this->contact->firstname,
            "language" => $this->contact->language,
            "contact_source" => "system",
            "organization_source" => "system"
        ]);

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Contacts",
            "log_type"      => 2,
            "message"       => 'New contact has been created.',
            "log_date"      => now()
        ]);

        //also make link between address and contact

        $this->switchmode('list');
        session()->flash('success', 'Contact successfully updated.');
        $this->dispatch('alert_remove');
    }


}

