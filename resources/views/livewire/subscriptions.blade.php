<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header3.jpg" icon="file-contract" iconcolor="amber" title="Subscriptions" subtitle="CRUD for Subscriptions" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_SUB'))
            <x-theme.iconbutton icon="file-contract" color="amber" wire="switchmode('add')" title="Add Subscription" />
            @endif
            <livewire:subscription-type-selector :selected="$selectedtypes" :user="$user" />
            <livewire:brand-selector :selected="$selectedbrand" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    These are all the subscriptions based on selected filters
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('subscriptions-table', ['selectedtypes' => $selectedtypes, 'selectedbrand' => $selectedbrand, 'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
