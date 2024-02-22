<?php

namespace App\Livewire;

use App\Models\Incident;
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
use App\Models\User;
use App\Models\UserSetting;

final class IncidentsTable extends PowerGridComponent
{
    use WithExport;

    public User $user;
    public $selectedstatus, $selectedbrand;
    public string $primaryKey = 'incidents.id';
    public string $sortField = 'incidents.id';

    #[On('brand-selector-changed')]
    public function updateBrandSelected($selected)
    {
        $this->selectedbrand=$selected;
    }

    #[On('incident-status-selector-changed')]
    public function updateIncidentStatusSelected($selected)
    {
        $this->selectedstatus=$selected;
    }

    public function setUp(): array
    {
        $this->showCheckBox('incident_nr');

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(mode: 'full'),
        ];
    }

    public function datasource(): Builder
    {
        //TODO if tenantadmin, see all (with tenant filter, all or certain tenant only)
        //TODO if partner, show partners and his customers (via active subscriptions)
        //TODO if end customer, show only those
        //TODO add type filter and impact filter

        return Incident::where('incidents.tenant_id',$this->user->tenant_id)
            ->whereIn('brand_id',$this->selectedbrand)
            ->whereIn('incident_status_id',$this->selectedstatus)
            ->join('organizations', function ($organizations) {
                $organizations->on('customer_id', '=', 'organizations.id');
            })
            ->join('incident_statuses', function ($statuses) {
                $statuses->on('incident_status_id', '=', 'incident_statuses.id');
            })
            ->join('incident_severities', function ($severities) {
                $severities->on('incident_severity_id', '=', 'incident_severities.id');
            })
            ->join('incident_types', function ($severities) {
                $severities->on('incident_type_id', '=', 'incident_types.id');
            })
            ->join('brands', function ($brands) {
                $brands->on('brand_id', '=', 'brands.id');
            });
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
            ->add('incident_nr')
            ->add('created_by')
            ->add('customer_id')
            ->add('name')               //customer name
            ->add('incident_type_id')
            ->add('incident_status_id')
            ->add('brand_id')
            ->add('product_id')
            ->add('subscription_id')
            ->add('title')
            ->add('description')
            ->add('time_spent')
            ->add('created_at')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100\"><img src=\"img/icon/vendor/".$model->brand_icon."\" title=\"".$model->brand_name."\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->incident_type_color."-600 fa fa-".$model->incident_type_icon."\" title=\"Type : ".$model->incident_type_name."\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->incident_status_color."-600 fa fa-".$model->incident_status_icon."\" title=\"Status : ".$model->incident_status_name."\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->incident_severity_color."-600 fa fa-".$model->incident_severity_icon."\" title=\"Impact : ".$model->incident_severity_name."\"></i>";

                return $tmp;
            });
    }

    public function columns(): array
    {
        //TODO if tenantadmin, also add column tenant (with name)

        return [
            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::make('Info', 'info'),

            Column::make('Incident nr', 'incident_nr')
                ->sortable()
                ->searchable(),

            Column::make('Customer', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Incident $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->incident_nr)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->incident_nr])
        ];
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
