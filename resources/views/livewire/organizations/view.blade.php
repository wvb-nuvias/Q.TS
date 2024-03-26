<div>

    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header2.jpg" icon="building" iconcolor="emerald" title="{{__('messages.organizations')}}" subtitle="{{__('messages.vieworganization')}}" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('EDIT_ORG'))
            <x-theme.iconbutton mode="edit" icon="building" color="emerald" wire="switchmode('edit')" title="Edit Organization" />
            @endif
        </x-slot>
        <x-slot name="content">
            <x-panel title="View Organization" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.completeform')}}
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">
                    <div class="flex flex-wrap -mx-3">
                        @if (in_array("VIEW_TENANT", $rights))
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Tenant') }}" />
                            <x-simple-select
                                wire:model="organization.tenant_id"
                                name="tenant_id"
                                id="tenant_id"
                                :options="$tenants"
                                value-field='id'
                                text-field='tenant_name'
                                placeholder="Select Tenant"
                                search-input-placeholder="Search Tenant"
                                :searchable="true"
                                disabled
                                class="form-select disabled border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            >
                                <x-slot name="customOption">
                                    <div class="h-10 flex flex-row opacity-50 hover:opacity-100 w-full bg-emerald-600 bg-opacity-50 cursor-pointer">
                                        <div class="flex h-10 justify-center w-10 mt-2 pr-2 pl-2">
                                            <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" :color="'${ option.tenant_color }'" :icon="'${ option.tenant_icon }'" />
                                        </div>
                                        <div class="flex flex-col">
                                            <div x-text="option.tenant_name" class="text-md"></div>
                                            <div x-text="option.tenant_icon" class="text-xs -mt-1"></div>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-simple-select>
                            <x-input-error for="tenant_id" class="mt-2" />
                        </div>
                        @else
                        <div class="w-6/12 max-w-full px-3 flex-0">
                        </div>
                        @endif
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Name') }}" />
                            <x-input disabled id="Name" type="text" class="disabled h-10 text-sm block w-full mt-1 placeholder-gray-500 dark:text-gray-400" wire:model="organization.name" autocomplete="hostname" placeholder="Enter Name" />
                            <x-input-error for="Name" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="number" value="{{ __('Number') }}" />
                            <x-input id="number" type="text" class="block w-full h-10 mt-1 text-sm placeholder-gray-500" wire:model="number" autocomplete="number" placeholder="Enter Number" />
                            <x-input-error for="number" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="afas_number" value="{{ __('Afas Number') }}" />
                            <x-input id="afas_number" type="text" class="block w-full h-10 mt-1 text-sm placeholder-gray-500" wire:model="afas_number" autocomplete="afas_number" placeholder="Enter Afas Number" />
                            <x-input-error for="afas_number" class="mt-2" />
                        </div>
                    </div>

                    <!-- if you are endcustomer, auto select this, if reseller only show where has subscription for-->
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Organization Type') }}" />
                            <x-simple-select
                                wire:model="organization.organization_type_id"
                                name="organization_type_id"
                                id="organization_type_id"
                                :options="$organizationtypes"
                                value-field='id'
                                text-field='organization_type_name'
                                placeholder="Select Organization Type"
                                search-input-placeholder="Search Organization Type"
                                :searchable="true"
                                disabled
                                class="form-select border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            >
                                <x-slot name="customOption">
                                    <div class="h-10 flex flex-row opacity-50 hover:opacity-100 w-full bg-purple-600 bg-opacity-50 cursor-pointer">
                                        <div class="flex h-10 justify-center w-10 mt-2 pr-2 pl-2">
                                            <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" color="${option.tenant_color}" icon="option.tenant_icon" />
                                        </div>
                                        <div class="flex flex-col">
                                            <div x-text="option.organization_type_name" class="text-md"></div>
                                            <div x-text="option.organization_type_icon" class="text-xs -mt-1"></div>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-simple-select>
                            <x-input-error for="organization_type_id" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0 flex flex-row">
                            <div class="w-full">
                                <x-label value="{{ __(' Address') }}" />
                                <x-input disabled id="address" type="text" class="disabled h-10 text-sm mt-1 block w-full placeholder-gray-500 dark:text-gray-400" value="{{$organization->address->tostring()}}" placeholder="Enter Address" />
                                <x-input-error for="address" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    @if ($organization->address)
                    <div class="flex flex-wrap pt-3 -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">

                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-map :address="$organization->address"/>

                        </div>
                    </div>
                    @endif

                </div>
                <div class="flex flex-wrap justify-end pt-6 space-x-3">
                    <x-theme.button wire="cancel">{{__('messages.cancel')}}</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
    @script
    <script>
        setTimeout(function() {
            enablemap({{$organization->address->lat}},{{$organization->address->lng}});
        }, 200);
    </script>
    @endscript
</div>



