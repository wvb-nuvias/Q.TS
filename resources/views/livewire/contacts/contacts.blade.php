<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header5.jpg" icon="building-user" iconcolor="purple" title="{{__('messages.contacts')}}" subtitle="{{__('messages.crudcontacts')}}" :user="$user">
        <x-slot name="header">
            @if ($user->hasright('CREATE_CONTACT'))
            <x-theme.iconbutton icon="building-user" color="purple" wire="switchmode('add')" title="{{__('messages.addcontact')}}" />
            @endif
            <livewire:contacts.contact-type-selector :selected="$selectedtypes" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="List" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.listcontacts')}}
                </x-panel.subtitle>
                <div class="pt-6 text-sm">
                    @livewire('contacts.contacts-table', ['selectedtypes' => $selectedtypes ,'user' => $user])
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
