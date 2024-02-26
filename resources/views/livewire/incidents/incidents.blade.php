<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header1.jpg" icon="ambulance" iconcolor="emerald" title="{{__('messages.incidents')}}" subtitle="{{__('messages.crudincidents')}}" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_INC'))
            <x-theme.iconbutton icon="ambulance" color="emerald" wire="switchmode('add')" title="{{__('messages.addincident')}}" />
            @endif
            <livewire:incidents.incident-status-selector :selected="$selectedstatus" />
            <livewire:brand-selector :selected="$selectedbrand" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.listincidents')}}
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('incidents.incidents-table', ['selectedstatus' => $selectedstatus, 'selectedbrand' => $selectedbrand, 'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
