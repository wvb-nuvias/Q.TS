<?php

namespace App\Livewire\Devices;

use App\Models\Device;
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

final class DevicesTable extends PowerGridComponent
{
    use WithExport;

    public User $user;
    public $selectedtypes;
    public $selectedbrand;
    public string $primaryKey = 'devices.id';
    public string $sortField = 'devices.id';

    #[On('brand-selector-changed')]
    public function updateBrandSelected($selected)
    {
        $this->selectedbrand=$selected;
    }

    #[On('device-type-selector-changed')]
    public function updateDeviceTypeSelected($selected)
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
        $devices= Device::where('devices.tenant_id',$this->user->tenant_id)
            ->whereIn('devices.device_type_id',$this->selectedtypes)
            ->join('device_types', function ($device_types) {
                $device_types->on('device_type_id', '=', 'device_types.id');
            })
            ->join('tenants', function ($tenants) {
                $tenants->on('devices.tenant_id', '=', 'tenants.id');
            })
            ;

        return $devices;
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
            ->add('hostname')
            ->add('ip')
            ->add('sysname')
            ->add('sysdesc')
            ->add('syscontact')
            ->add('sysos')
            ->add('sysversion')
            ->add('device_type_id')
            ->add('device_type_name')
            ->add('brand_id')
            ->add('hardware')
            ->add('serial')
            ->add('address_id')
            ->add('image')
            ->add('icon')
            ->add('notes')
            ->add('ignore')
            ->add('created_at')
            ->add('device_source')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100\"><img src=\"svg/{$model->brand_name}-logo-small.php?color={$model->brand_colorcode}\" title=\"".$model->brand_name."\" class=\"h-4 w-4\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->device_type_color."-600 fa fa-".$model->device_type_icon."\" title=\"Type : ".$model->device_type_name."\"></i>";

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

        $columns[]=Column::make('Hostname', 'hostname')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Ip', 'Ip')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Serial', 'serial')
            ->sortable()
            ->searchable();

        $columns[]=Column::make('Source', 'device_source')
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

    #[\Livewire\Attributes\On('edit_device')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Device $row): array
    {
        return Actions::action_buttons($row->id,'device','DEV',$row,$this->user);
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
