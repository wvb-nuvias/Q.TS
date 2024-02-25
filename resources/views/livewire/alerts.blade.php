<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header4.jpg" icon="bell" iconcolor="red" title="Alerts" subtitle="CRUD for Alerts" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_ALERT'))
            <x-theme.iconbutton icon="bell" color="red" wire="switchmode('add')" title="Add Alert" />
            @endif
            <livewire:alert-type-selector :selected="$selectedtypes" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    These are all the alerts based on selected filters
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('alerts-table', ['selectedtypes' => $selectedtypes ,'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
