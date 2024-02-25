<div>
    <x-layouts.add themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header2.jpg" icon="server" iconcolor="cyan" title="Device" subtitle="Add a Device" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <div class="flex flex-wrap -mx-3">
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="DeviceType" value="{{ __(' Device Type') }}" />
                    <x-input id="DeviceType" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                    <x-input-error for="DeviceType" class="mt-2" />
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
                    <x-input id="Name" type="text" class="mt-1 block w-full" wire:model="device.hostname" autocomplete="hostname" />
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
