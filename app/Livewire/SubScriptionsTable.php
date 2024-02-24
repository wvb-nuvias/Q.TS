<?php

namespace App\Livewire;

use App\Models\Subscription;
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

final class SubScriptionsTable extends PowerGridComponent
{
    use WithExport;

    public User $user;
    public $selectedtypes, $selectedbrand;
    public string $primaryKey = 'subscriptions.id';
    public string $sortField = 'subscriptions.id';

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

    #[On('subscription-type-selector-changed')]
    public function updateSubscriptionTypeSelected($selected)
    {
        $this->selectedtypes=$selected;
    }

    #[On('brand-selector-changed')]
    public function updateBrandSelected($selected)
    {
        $this->selectedbrand=$selected;
    }


    public function datasource(): Builder
    {
        $subscriptions= Subscription::where('subscriptions.tenant_id',$this->user->tenant_id);

        if ($subscriptions)
        {
            $subscriptions=$subscriptions->join('organizations', function ($organizations) {
                $organizations->on('customer_id', '=', 'organizations.id');
            });

            $subscriptions=$subscriptions->whereIn('subscriptions.brand_id',$this->selectedbrand);
            $subscriptions=$subscriptions->whereIn('subscriptions.subscription_type_id',$this->selectedtypes);

            $subscriptions
            ->join('subscription_types', function ($subscription_types) {
                $subscription_types->on('subscription_type_id', '=', 'subscription_types.id');
            });

            $subscriptions
            ->join('brands', function ($brands) {
                $brands->on('brand_id', '=', 'brands.id');
            });

            $subscriptions
            ->join('tenants', function ($tenants) {
                $tenants->on('subscriptions.tenant_id', '=', 'tenants.id');
            });

            $subscriptions
            ->join('products', function ($products) {
                $products->on('product_id', '=', 'products.id');
            })
            ;
        } else {
            $subscriptions="";
        }

        return $subscriptions;
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
            ->add('subscription_type_id')
            ->add('code')
            ->add('product_id')
            ->add('product_name')
            ->add('name')
            ->add('description')
            ->add('cost')
            ->add('date_start')
            ->add('date_end')
            ->add('customer_id')
            ->add('reseller_id')
            ->add('serial')
            ->add('brand_id')
            ->add('created_at')
            ->add('info', function ($model) {
                $tmp="<i class=\"p-1 opacity-80 hover:opacity-100\"><img src=\"svg/{$model->brand_name}-logo-small.php?color={$model->brand_colorcode}\" class=\"h-6 w-6\"></i>";
                $tmp.="<i class=\"p-1 opacity-80 hover:opacity-100 text-".$model->subscription_type_color."-600 fa fa-".$model->subscription_type_icon."\" title=\"Type : ".$model->subscription_type_name."\"></i>";

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

        $columns[]=Column::make('SKU', 'code')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('Customer', 'name', 'organizations.name')
                ->sortable()
                ->searchable();

        $columns[]=Column::make('Name', 'name')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('Description', 'description')
        ->sortable()
        ->searchable();

        $columns[]=Column::make('Serial', 'serial')
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

    #[\Livewire\Attributes\On('edit_subscription')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Subscription $row): array
    {
        return Actions::action_buttons($row->id,'subscription','SUB',$row,$this->user);
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
