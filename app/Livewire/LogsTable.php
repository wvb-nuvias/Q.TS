<?php

namespace App\Livewire;

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

    #[On('log-type-selector-changed')]
    public function updateLogTypeSelected($selected)
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
        $logs=Log::select('*')
        ->join('log_types', function ($log_types) {
            $log_types->on('log_type', '=', 'log_types.id');
        })
        ->join('users', function ($users) {
            $users->on('log_user_id', '=', 'users.id');
        });

        $logs=$logs->where('source',$this->source);

        $logs=$logs->whereIn('log_type',$this->selectedtypes);

        //dd($logs->get());

        //$logs=$logs->where('logs.tenant_id',$user->tenant_id);

        //dd($logs->get());

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
        return [
            Column::make('Log date', 'log_date', 'log_date')
                ->sortable(),

            Column::make('Info', 'info'),

            Column::make('Category', 'category')
                ->sortable()
                ->searchable(),

            Column::make('User', 'fullname')
                ->sortable()
                ->searchable('users.name'),

            Column::make('Source', 'source')
                ->sortable()
                ->searchable(),

            Column::make('Message', 'message')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
    //        Filter::datetimepicker('log_date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Log $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
