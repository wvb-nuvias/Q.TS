<?php

namespace App\Livewire\Organizations;

use Livewire\Component;
use App\Models\Log;
use App\Models\User;
use App\Models\Address;
use App\Models\Organization;
use App\Models\OrganizationType;
use Livewire\Attributes\On;
use App\Models\UserSetting;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;

class Organizations extends Component
{
    public bool $showImportModal, $showConfirmImportModal = false;
    public User $user;
    public $selectedtypes = [2,3,4];
    public $rights;
    public $mode="list";
    public $isnew=true;
    public $organization=null;
    public $organizationtypes=null;
    public $organizationtype,$tenant,$organization_id,$tenant_id,$tenant_icon,$tenant_color,$tenant_name,$name,$number,$address_id,$organization_type_id,$managedby,$source;
    public $address,$tenants=null,$addresses,$afas_number;

    protected $rules = [
        'organization.name' => 'required',
        'organization.organization_type_id' => 'required',
        'organization.tenant_id' => 'required',
        'address_id' => 'required',
        'number' => 'required'
        //TODO: afas_number not required?
    ];

    #[On('edit_organization')]
    public function edit($rowId): void
    {
        $this->number=$rowId;
        $this->switchmode('edit');
    }

    #[On('view_organization')]
    public function view($rowId): void
    {
        $this->number=$rowId;
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

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $this->addresses=Address::select('*',DB::raw("CONCAT(street,' ',number,', ',postal,' ',city,', ',country) AS full"))
            ->where('tenant_id',$this->user->tenant_id)
            ->get()
            ->toArray();

        $sel=$this->user->setting("organizationtypes");
        if ($sel)
        {
            $this->selectedtypes=explode(",",$sel);
        }

        $this->tenant_id=$this->user->tenant_id;

        $this->organizationtypes=OrganizationType::where('tenant_id',$this->user->tenant_id)
            ->whereIn('id',$this->selectedtypes)
            ->select('id','hidden','organization_type_name','organization_type_icon', 'organization_type_color')
            ->get()
            ->toArray();

        $this->tenants=Tenant::select('id', 'tenant_name', 'tenant_icon', 'tenant_color')->get()->toArray();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Organizations",
            "log_type"      => 2,
            "message"       => 'Organizations Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_ORG'))
        {
            if ($this->mode=="list")
                return view('livewire.organizations.organizations');
            if ($this->mode=="add")
            {
                $this->address=new Address();
                $this->organization=new Organization();

                return view('livewire.organizations.add');
            }
            if ($this->mode=="edit")
            {
                $this->organization=Organization::where('number', $this->number)->first();
                $this->address=$this->organization->address;

                return view('livewire.organizations.edit');
            }
            if ($this->mode=="view")
            {
                $this->organization=Organization::where('number', $this->number)->first();
                $this->address=$this->organization->address;

                return view('livewire.organizations.view');
            }
        }
        else
        {
            return view('errors.403');
        }
    }

    #[On('organization-type-selector-changed')]
    public function updateOrganizationTypeSelected($selected)
    {
        $sel=UserSetting::where("tenant_id",$this->user->tenant_id)
                        ->where("user_id",$this->user->id)
                        ->where("key","organizationtypes")
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
                    "key"           => "organizationtypes",
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
            "ordinal" => 1,                 //TODO: find way out to check if it is second address for same org
            "street" => $address["street"],
            "number" => $address["number"],
            "afas_number" => $address["afas_number"],
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

    #[On('changeOrganizationType')]
    public function changeOrganizationType()
    {
        $result=OrganizationType::where('id',$this->organization_type_id)
            ->first();
        $this->number=$result->getnextnumber();
    }

    public function saveOrganization()
    {
        $neworg=Organization::create([
            "tenant_id" => $this->tenant_id,
            "number" => $this->number,
            "afas_number" => $this->afas_number,
            "address_id" => $this->address->address_id,
            "organization_type_id" => $this->organization_type_id,
            "name" => $this->organization->name,
            "managedby" => $this->user->organization->id,
            "organization_source" => "system"
        ]);

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Organizations",
            "log_type"      => 2,
            "message"       => 'New organization has been created.',
            "log_date"      => now()
        ]);

        $orgtype=OrganizationType::where('id',$this->organization_type_id)
            ->first();
        $orgtype->organization_type_number=$this->number;
        $orgtype->save();

        //TODO: also make link between address and organization

        $this->switchmode('list');
        session()->flash('success', 'Organization successfully created.');
        $this->dispatch('alert_remove');
    } 

    public function updateOrganization()
    {
        $org = Organization::where('id',$this->organization_id)->first();

        $org->afas_number = $this->afas_number;
        $org->address_id = $this->address->address_id;
        $org->name = $this->organization->name;
        $org->managedby = $this->user->organization->id;
        $org->organization_source = "system";

        $org->save();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Organizations",
            "log_type"      => 2,
            "message"       => 'Organization has been updated.',
            "log_date"      => now()
        ]);

        //TODO: also make link between address and organization

        $this->switchmode('list');
        session()->flash('success', 'Organization successfully updated.');
        $this->dispatch('alert_remove');
    }
}
