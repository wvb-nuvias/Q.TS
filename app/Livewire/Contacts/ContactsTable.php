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
        $contacts= Contact::where('contacts.tenant_id',$this->user->tenant_id)
            ->whereIn('contacts.contact_type_id',$this->selectedtypes)
            ->join('contact_types', function ($organization_types) {
                $organization_types->on('contact_type_id', '=', 'contact_types.id');
            })
            ->join('tenants', function ($tenants) {
                $tenants->on('contacts.tenant_id', '=', 'tenants.id');
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
            ->add('id')
            ->add('tenant_id')
            ->add('customer_id')
            ->add('contact_type_id')
            ->add('job_id')
            ->add('lastname')
            ->add('firstname')
            ->add('contact_source')
            ->add('created_at');
    }

    public function columns(): array
    {
        $columns=[];

        if ($this->user->role->role_name=='Tenant Administrator')
        {
            $columns[]=Column::make('Tenant', 'tenant_name');
        }

        $columns[]=Column::make('Info', 'info');

        $columns[]=Column::make('Number', 'number')
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

        /*
        return [
            Column::make('Id', 'id'),
            Column::make('Tenant id', 'tenant_id')
                ->sortable()
                ->searchable(),

            Column::make('Customer id', 'customer_id')
                ->sortable()
                ->searchable(),

            Column::make('Contact type id', 'contact_type_id')
                ->sortable()
                ->searchable(),

            Column::make('Job id', 'job_id')
                ->sortable()
                ->searchable(),

            Column::make('Lastname', 'lastname')
                ->sortable()
                ->searchable(),

            Column::make('Firstname', 'firstname')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
        */
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit_contact')]
    public function edit_contact($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Contact $row): array
    {
        $actions= Actions::action_buttons($row->id,'contact','CON',$row,$this->user);
        //dd($actions);
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
