<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header4.jpg" icon="bell" iconcolor="red" title="{{__('messages.alerts')}}" subtitle="{{__('messages.crudalerts')}}" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_ALERT'))
            <x-theme.iconbutton icon="bell" color="red" wire="switchmode('add')" title="{{__('messages.addalert')}}" />
            @endif
            <livewire:alerts.alert-type-selector :selected="$selectedtypes" />
            <livewire:brands.brand-selector :selected="$selectedbrand" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.listalerts')}}
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('alerts.alerts-table', ['selectedtypes' => $selectedtypes ,'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
