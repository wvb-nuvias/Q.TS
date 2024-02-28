<div>

    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header2.jpg" icon="building" iconcolor="emerald" title="{{__('messages.organizations')}}" subtitle="{{__('messages.addorganization')}}" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="New Organization" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.completeform')}}
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">
                    @if (in_array("VIEW_TENANT", $rights))
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="tenant_id" value="{{ __(' Tenant') }}" />
                            <x-simple-select
                                name="tenant_id"
                                id="tenant_id"
                                :options="$tenants"
                                value-field='id'
                                text-field='tenant_name'
                                placeholder="Select Tenant"
                                search-input-placeholder="Search Tenant"
                                :searchable="true"
                                class="form-select"
                            />
                            <x-input-error for="tenant_id" class="mt-2" />
                        </div>
                    </div>
                    @endif
                    <!-- if you are endcustomer, auto select this, if reseller only show where has subscription for-->
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="organization_type_id" value="{{ __(' Organization Type') }}" />
                            <x-simple-select
                                name="organization_type_id"
                                id="organization_type_id"
                                :options="$organizationtypes"
                                value-field='id'
                                text-field='organization_type_name'
                                placeholder="Select Organization"
                                search-input-placeholder="Search Organization"
                                :searchable="true"
                                class="form-select"
                            />
                            <x-input-error for="organization_type_id" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Name" value="{{ __(' Name') }}" />
                            <x-input id="Name" type="text" class="block w-full mt-1" wire:model="organization.name" autocomplete="hostname" />
                            <x-input-error for="Name" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Address" value="{{ __(' Address') }}" />
                            <x-input id="Address" type="text" class="block w-full mt-1" wire:model="" autocomplete="" />
                            <x-input-error for="Address" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-end pt-6 space-x-3">
                    <x-theme.button wire="openImportModal">{{__('messages.import')}}</x-theme.button>
                    <x-theme.button wire="updateOrganization">{{__('messages.saveorganization')}}</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
    <livewire:imports.imports :destination="'organizations'" />
</div>
