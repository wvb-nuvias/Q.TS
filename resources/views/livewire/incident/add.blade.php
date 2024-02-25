<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header1.jpg" icon="ambulance" iconcolor="emerald" title="Incident" subtitle="Add an Incident" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="New Incident" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    Please complete the form
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="IncidentType" value="{{ __(' Incident Type') }}" />
                            <x-input id="IncidentType" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                            <x-input-error for="IncidentType" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Tenant" value="{{ __(' Tenant') }}" />
                            <x-input id="Tenant" type="text" class="mt-1 block w-full" wire:model="" autocomplete="tenant" />
                            <x-input-error for="Tenant" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Title" value="{{ __(' Title') }}" />
                            <x-input id="Title" type="text" class="mt-1 block w-full" wire:model="incident.title" autocomplete="title" />
                            <x-input-error for="Title" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Address" value="{{ __(' Address') }}" />
                            <x-input id="Address" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                            <x-input-error for="Address" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-end pt-6">
                    <x-theme.button wire="updateIncident">Save Incident</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
