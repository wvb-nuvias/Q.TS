<?php

namespace App\Livewire\Organizations;

use App\Models\Organization;
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

final class OrganizationsTable extends PowerGridComponent
{
    use WithExport;

    public User $user;
    public $selectedtypes;
    public string $primaryKey = 'organizations.id';
    public string $sortField = 'organizations.id';

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

    #[On('organization-type-selector-changed')]
    public function updateOrganizationTypeSelected($selected)
    {
        $this->selectedtypes=$selected;
    }

    public function datasource(): Builder
    {
        $orgs= Organization::where('organizations.tenant_id',$this->user->tenant_id)
            ->whereIn('organizations.organization_type_id',$this->selectedtypes)
            ->join('organization_types', function ($organization_types) {
                $organization_types->on('organization_type_id', '=', 'organization_types.id');
            })
            ->join('tenants', function ($tenants) {
                $tenants->on('organizations.tenant_id', '=', 'tenants.id');
            })
            ;

        return $orgs;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('organizations.id')
            ->add('tenant_id')
            ->add('number')
            ->add('address_id')
            ->add('organization_type_id')
            ->add('organization_type_name')
            ->add('name')
            ->add('organization_source')
            ->add('managed_by')
            ->add('created_at')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->organization_type_color."-600 fa fa-".$model->organization_type_icon."\" title=\"Type : ".$model->organization_type_name."\"></i>";

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

        $columns[]=Column::make('Number', 'number')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Name', 'name')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Source', 'organization_source')
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

    public function actions(\App\Models\Organization $row): array
    {
        if ($row->id!=1)
        {
            dd($row);
        }

        $actions= Actions::action_buttons($row->number,'organization','ORG',$row,$this->user);
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
