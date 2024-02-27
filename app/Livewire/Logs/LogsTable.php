<?php

namespace App\Livewire\Logs;

use App\Models\Log;
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

final class LogsTable extends PowerGridComponent
{
    use WithExport;

    public User $user;
    public string $primaryKey = 'logs.id';
    public string $sortField = 'logs.id';
    public $source="Subscriptions";
    public $logs;
    public string $search="";
    public $category="";
    public $orderby="log_date";
    public $log_type=1;
    public $tenant_id;
    public $selectedtypes;
    public $update;

    #[On('log-type-selector-changed')]
    public function updateLogTypeSelected($selected)
    {
        $this->selectedtypes=$selected;
    }

    #[On('update-log')]
    public function refreshcomponent()
    {
        $this->update = !$this->update;
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
        $logs=Log::select('*')
        ->join('log_types', function ($log_types) {
            $log_types->on('log_type', '=', 'log_types.id');
        })
        ->join('users', function ($users) {
            $users->on('log_user_id', '=', 'users.id');
        })
        ->join('tenants', function ($tenants) {
            $tenants->on('logs.tenant_id', '=', 'tenants.id');
        });

        $logs=$logs->where('source',$this->source);

        $logs=$logs->whereIn('log_type',$this->selectedtypes);

        if ($this->category!="")
        {
            $logs=$logs->where('category',$this->category);
        }

        if ($this->log_type!=1)
        {
            $logs=$logs->where('log_type',$this->log_type);
        }

        $logs=$logs->orderBy($this->orderby,'DESC');

        return $logs;
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
            ->add('log_user_id')
            ->add('category')
            ->add('source')
            ->add('message')
            ->add('log_date_formatted', fn (Log $model) => Carbon::parse($model->log_date)->format('d/m/Y H:i:s'))
            ->add('created_at')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->log_type_color."-600 fa fa-".$model->log_type_icon."\" title=\"Type : ".$model->log_type_name."\"></i>";

                return $tmp;
            })
            ->add('fullname', function ($model) {
                return $model->firstname." ".$model->name;
            });
    }

    public function columns(): array
    {
        $columns=[];

        if ($this->user->role->role_name=='Tenant Administrator')
        {
            $columns[]=Column::make('Tenant', 'tenant_name');
        }

        $columns[]=Column::make('Log date', 'log_date', 'log_date_formatted')
        ->sortable();

        $columns[]=Column::make('Info', 'info');

        $columns[]=Column::make('Category', 'category')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('User', 'fullname')
        ->sortable()
        ->searchable('users.name');

        $columns[]=Column::make('Source', 'source')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('Message', 'message')
        ->sortable()
        ->searchable();

        $columns[]=Column::action('Action');

        return $columns;
    }

    public function filters(): array
    {
        return [
    //        Filter::datetimepicker('log_date'),
        ];
    }

    #[\Livewire\Attributes\On('viewlog')]
    public function view($rowId): void
    {
        $this->js('alert(\'View: \','.$rowId.')');
    }

    #[\Livewire\Attributes\On('editlog')]
    public function edit($rowId): void
    {
        $this->js('alert(\'Edit: \','.$rowId.')');
    }

    #[\Livewire\Attributes\On('deletelog')]
    public function delete($rowId): void
    {
        $this->js('alert(\'Delete: \','.$rowId.')');
    }

    public function actions(\App\Models\Log $row): array
    {
        $buttons=[];

        if ($this->user->hasright('VIEW_LOG'))
        {
            $buttons[]=Button::add('view')
            ->slot('<i class="fa fas fa-solid fa-eye fa-2xs fa-fw" title="View: '.$row->id.'"></i>')
            ->id()
            ->class('inline-flex items-center justify-center w-5 h-5 ml-1 bg-green-600 opacity-80 dark:text-white hover:opacity-100 border border-white rounded-full focus:shadow-outline')
            ->dispatch('viewlog', ['rowId' => $row->id]);
        }

        if ($this->user->hasright('EDIT_LOG'))
        {
            $buttons[]=Button::add('edit')
                ->slot('<i class="fa fas fa-solid fa-pen fa-2xs fa-fw" title="Edit: '.$row->id.'"></i>')
                ->id()
                ->class('inline-flex items-center justify-center w-5 h-5 ml-1 bg-amber-600 opacity-80 dark:text-white hover:opacity-100 border border-white rounded-full focus:shadow-outline')
                ->dispatch('editlog', ['rowId' => $row->id]);
        }

        if ($this->user->hasright('DELETE_LOG'))
        {
            $buttons[]=Button::add('delete')
                ->slot('<i class="fa fas fa-solid fa-trash-can fa-2xs fa-fw" title="Delete: '.$row->id.'"></i>')
                ->id()
                ->class('inline-flex items-center justify-center w-5 h-5 ml-1 bg-red-600 opacity-80 dark:text-white hover:opacity-100 border border-white rounded-full focus:shadow-outline')
                ->dispatch('deletelog', ['rowId' => $row->id]);
        }

        return $buttons;
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
