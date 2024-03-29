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
use Illuminate\Support\Facades\DB;

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
    public $contact_type_id;
    public $contact_type_number;
    public $contact_afas_number;
    public $contact_id;
    public $contact;
    public $address_id;
    public $address,$tenants=null,$tenant_id;
    public $organizations;
    public $organization_id,$addresses;
    public $jobs,$languages,$refresh=false;
    public $job_id,$language,$lastname,$firstname,$contact_number;

    protected $rules = [
        'tenant_id' => 'required',
        'organization_id' => 'required',
        'contact_type_id' => 'required',
        'contact_number' => 'required',
        'job_id' => 'required',
        'lastname' => 'required',
        'firstname' => 'required',
        'language' => 'required',
        'address_id' => 'required',
    ];

    #[On('edit_contact')]
    public function edit($rowId): void
    {
        $this->contact_id=$rowId;
        $this->switchmode('edit');
    }

    #[On('view_contact')]
    public function view($rowId): void
    {
        $this->contact_id=$rowId;
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

    #[On('cancel_import')]
    public function cancelImportModal()
    {
        $this->showImportModal = false;
    }

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    #[On('select')]
    public function select(): void
    {
        //$this->refresh=!$this->refresh;

    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $this->addresses=Address::select('*',DB::raw("CONCAT(street,' ',number,', ',postal,' ',city,', ',country) AS full"))
            ->where('tenant_id',$this->user->tenant_id)
            ->get()
            ->toArray();

        $this->languages=Language::select('language_code', 'language_name', 'language_flag')
            ->get()
            ->toArray();

        $sel=$this->user->setting("contacttypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        $this->jobs=Job::where('tenant_id',$this->user->tenant_id)
            ->select('id','job_name', 'job_source')
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

                $this->address_id=null;
                $this->tenant_id=$this->user->tenant_id;
                $this->organization_id=null;
                $this->contact_type_id=null;
                $this->job_id=null;
                $this->lastname=null;
                $this->firstname=null;
                $this->language=null;

                //TODO add contact_type_number to $this->contact_number
                $this->contact_number=null;
                $this->contact_afas_number=null;

                return view('livewire.contacts.add');
            }
            if ($this->mode=="edit")
            {
                $this->contact=Contact::where('id', $this->contact_id)->first();
                $this->address=$this->contact->address;
                $this->address_id=$this->contact->address_id;
                $this->tenant_id=$this->contact->tenant_id;
                $this->organization_id=$this->contact->organization_id;
                $this->contact_type_id=$this->contact->contact_type_id;
                $this->job_id=$this->contact->job_id;
                $this->lastname=$this->contact->lastname;
                $this->firstname=$this->contact->firstname;
                $this->language=$this->contact->language;
                $this->contact_number=$this->contact_number;
                $this->contact_afas_number=$this->contact_afas_number;

                return view('livewire.contacts.edit');
            }
            if ($this->mode=="view")
            {
                $this->contact=Contact::where('id', $this->contact_id)->first();
                $this->address=$this->contact->address;
                $this->address_id=$this->contact->address_id;
                $this->tenant_id=$this->contact->tenant_id;
                $this->organization_id=$this->contact->organization_id;
                $this->contact_type_id=$this->contact->contact_type_id;
                $this->job_id=$this->contact->job_id;
                $this->lastname=$this->contact->lastname;
                $this->firstname=$this->contact->firstname;
                $this->language=$this->contact->language;
                $this->contact_number=$this->contact_number;
                $this->contact_afas_number=$this->contact_afas_number;

                return view('livewire.contacts.view');
            }
        }
        else
        {
            return view('errors.403');
        }
    }

    #[On('changeContactType')]
    public function changeContactType()
    {
        $result=ContactType::where('id',$this->contact_type_id)
            ->first();
        $this->contact_number=$result->getnextnumber();
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
            "organization_id" => $this->organization_id,
            "contact_type_id" => $this->contact_type_id,
            "contact_number" => $this->contact_number,
            "contact_afas_number" => $this->contact_afas_number,
            "job_id" => $this->job_id,
            "lastname" => $this->lastname,
            "firstname" => $this->firstname,
            "language" => $this->language,
            "address_id" => $this->address_id,
            "contact_source" => "system"
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

        //TODO: also make link between address and contact

        $this->switchmode('list');
        session()->flash('success', 'Contact successfully created.');
        $this->dispatch('alert_remove');
    }

    public function updateContact()
    {
        $selcon=Contact::where('id',$this->contact_id)->first();

        $selcon->contact_afas_number = $this->contact_afas_number;
        $selcon->job_id = $this->job_id;
        $selcon->lastname = $this->lastname;
        $selcon->firstname = $this->firstname;
        $selcon->language = $this->language;
        $selcon->address_id = $this->address_id;
        $selcon->contact_source = "system";

        $selcon->save();

        //TODO: also make link between address and contact, remove the

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Contacts",
            "log_type"      => 2,
            "message"       => 'Contact has been updated.',
            "log_date"      => now()
        ]);

        $this->switchmode('list');
        session()->flash('success', 'Contact successfully updated.');
        $this->dispatch('alert_remove');
    }
}

