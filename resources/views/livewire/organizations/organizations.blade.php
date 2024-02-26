<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header2.jpg" icon="building" iconcolor="emerald" title="Organizations" subtitle="CRUD for Organizations" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_ORG'))
            <x-theme.iconbutton icon="building" color="emerald" wire="switchmode('add')" title="Add Organization" />
            @endif
            <livewire:organizations.organization-type-selector :selected="$selectedtypes" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    These are all the organizations based on selected filters
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('organizations.organizations-table', ['selectedtypes' => $selectedtypes ,'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
