<?php

namespace App\Livewire\Incidents;

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
use App\Livewire\Actions;
use App\Models\User;
use App\Models\Log;
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
            })
            ->join('tenants', function ($tenants) {
                $tenants->on('incidents.tenant_id', '=', 'tenants.id');
            })
            ;
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
            ->add('tenant_name')
            ->add('incident_nr')
            ->add('created_by')
            ->add('customer_id')
            ->add('organizations.name')               //customer name
            ->add('incident_type_id')
            ->add('incident_status_id')
            ->add('brand_id')
            ->add('product_id')
            ->add('subscription_id')
            ->add('title')
            ->add('description')
            ->add('time_spent')
            ->add('created_at')
            ->add('incident_source')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100\"><img src=\"svg/{$model->brand_name}-logo-small.php?color={$model->brand_colorcode}\" title=\"".$model->brand_name."\" class=\"h-4 w-4\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->incident_type_color."-600 fa fa-".$model->incident_type_icon."\" title=\"Type : ".$model->incident_type_name."\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->incident_status_color."-600 fa fa-".$model->incident_status_icon."\" title=\"Status : ".$model->incident_status_name."\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->incident_severity_color."-600 fa fa-".$model->incident_severity_icon."\" title=\"Impact : ".$model->incident_severity_name."\"></i>";

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

        $columns[]=Column::make('Created at', 'created_at')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('Info', 'info');

        $columns[]=Column::make('Nr', 'incident_nr')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('Organization', 'name', 'organizations.name')
                ->sortable()
                ->searchable();

        $columns[]=Column::make('Title', 'title')
                ->sortable()
                ->searchable();

        $columns[]=Column::make('Time Spent', 'time_spent')
                ->sortable()
                ->searchable();

        $columns[]=Column::make('Source', 'incident_source')
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

    #[\Livewire\Attributes\On('edit_incident')]
    public function edit($rowId): void
    {
        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "Operation",
            "source"        => "Incidents",
            "log_type"      => 3,
            "message"       => 'incident nr #'.$rowId.' is being edited.',
            "log_date"      => now()
        ]);

        session()->flash('success', 'incident nr #'.$rowId.' is being edited.');
        $this->dispatch('update-log');
    }

    #[\Livewire\Attributes\On('delete_incident')]
    public function delete($rowId): void
    {
        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "Operation",
            "source"        => "Incidents",
            "log_type"      => 3,
            "message"       => 'incident nr #'.$rowId.' is deleted.',
            "log_date"      => now()
        ]);
        $this->dispatch('update-log');
    }

    #[\Livewire\Attributes\On('view_incident')]
    public function view($rowId): void
    {
        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "Operation",
            "source"        => "Incidents",
            "log_type"      => 3,
            "message"       => 'incident nr #'.$rowId.' is being viewed.',
            "log_date"      => now()
        ]);

        session()->flash('success', 'incident nr #'.$rowId.' is being viewed.');
        $this->dispatch('update-log');
    }

    #[\Livewire\Attributes\On('close_incident')]
    public function close($rowId): void
    {
        $incident=Incident::where('incident_nr',$rowId)->first();
        $incident->incident_status_id=6;
        $incident->save();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "Operation",
            "source"        => "Incidents",
            "log_type"      => 3,
            "message"       => 'incident nr #'.$rowId.' is closed.',
            "log_date"      => now()
        ]);

        session()->flash('success', 'incident nr #'.$rowId.' is closed.');
        $this->dispatch('update-log');

    }

    #[\Livewire\Attributes\On('reopen_incident')]
    public function reopen($rowId): void
    {
        $incident=Incident::where('incident_nr',$rowId)->first();
        $incident->incident_status_id=2;
        $incident->save();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "Operation",
            "source"        => "Incidents",
            "log_type"      => 3,
            "message"       => 'incident nr #'.$rowId.' is reopened.',
            "log_date"      => now()
        ]);

        session()->flash('success', 'incident nr #'.$rowId.' is reopened.');
        $this->dispatch('update-log');

    }

    public function actions(\App\Models\Incident $row): array
    {
        return Actions::action_buttons($row->incident_nr,'incident','INC',$row,$this->user);
    }

    /*

    //class="inline-flex items-center justify-center w-5 h-5 ml-1 text-gray-200 bg-gray-800 border border-gray-300 rounded-full hover:bg-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600 dark:text-white dark:border-transparent focus:shadow-outline"

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
