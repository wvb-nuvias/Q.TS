<div>
    <x-layouts.add themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header2.jpg" icon="building" iconcolor="emerald" title="Organization" subtitle="Add an Organization" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <div class="flex flex-wrap -mx-3">
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="OrganizationType" value="{{ __(' Organization Type') }}" />
                    <x-input id="OrganizationType" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                    <x-input-error for="OrganizationType" class="mt-2" />
                </div>
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="Tenant" value="{{ __(' Tenant') }}" />
                    <x-input id="Tenant" type="text" class="mt-1 block w-full" wire:model="" autocomplete="tenant" />
                    <x-input-error for="Tenant" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="Name" value="{{ __(' Name') }}" />
                    <x-input id="Name" type="text" class="mt-1 block w-full" wire:model="organization.name" autocomplete="hostname" />
                    <x-input-error for="Name" class="mt-2" />
                </div>
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="Address" value="{{ __(' Address') }}" />
                    <x-input id="Address" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                    <x-input-error for="Address" class="mt-2" />
                </div>
            </div>
        </x-slot>
    </x-layouts.add>
</div>
