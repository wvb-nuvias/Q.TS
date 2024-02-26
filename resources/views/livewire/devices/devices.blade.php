<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header1.jpg" icon="server" iconcolor="cyan" title="Devices" subtitle="CRUD for Devices" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_DEVICE'))
            <x-theme.iconbutton icon="server" color="cyan" wire="switchmode('add')" title="Add Device" />
            @endif
            <livewire:devices.device-type-selector :selected="$selectedtypes" />
            <livewire:brand-selector :selected="$selectedbrand" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    These are all the devices based on selected filters
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('devices.devices-table', ['selectedtypes' => $selectedtypes, 'selectedbrand' => $selectedbrand, 'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
