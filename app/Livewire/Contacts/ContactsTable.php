<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Livewire\Attributes\On;
use App\Livewire\Actions;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\DB;

final class ContactsTable extends PowerGridComponent
{
    use WithExport;
    public User $user;
    public $selectedtypes;
    public string $primaryKey = 'contacts.id';
    public string $sortField = 'contacts.id';

    #[On('contact-type-selector-changed')]
    public function updateContactTypeSelected($selected)
    {
        $this->selectedtypes=$selected;
    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $contacts= Contact::select('*',DB::raw("contacts.id AS contact_id"))
            ->where('contacts.tenant_id',$this->user->tenant_id)
            ->whereIn('contacts.contact_type_id',$this->selectedtypes)
            ->join('contact_types', function ($contact_types) {
                $contact_types->on('contact_type_id', '=', 'contact_types.id');
            })
            ->join('tenants', function ($tenants) {
                $tenants->on('contacts.tenant_id', '=', 'tenants.id');
            })
            ->join('organizations', function ($organization) {
                $organization->on('contacts.organization_id', '=', 'organizations.id');
            })
            ;

        return $contacts;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('contact_id')
            ->add('tenant_id')
            ->add('customer_id')
            ->add('contact_type_id')
            ->add('job_id')
            ->add('lastname')
            ->add('firstname')
            ->add('organizations.name')
            ->add('contact_source')
            ->add('created_at')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->contact_type_color."-600 fa fa-".$model->contact_type_icon."\" title=\"Type : ".$model->contact_type_name."\"></i>";

                return $tmp;
            });
    }

    public function columns(): array
    {
        $columns=[];

        if ($this->user->role->role_name=='Tenant Administrator')
        {
            $columns[]=Column::make('Tenant', 'tenant_name');
        }

        $columns[]=Column::make('Info', 'info');

        $columns[]=Column::make('Organization', 'organizations.name')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Firstname', 'firstname')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Lastname', 'lastname')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Source', 'contact_source')
            ->sortable()
            ->searchable();

        $columns[]=Column::action('Action');

        return $columns;
    }

    public function filters(): array
    {
        return [
        ];
    }

    public function actions(\App\Models\Contact $row): array
    {
        //dd($row);
        $actions= Actions::action_buttons($row->contact_id,'contact','CONTACT',$row,$this->user);
        return $actions;
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
