<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header4.jpg" icon="bell" iconcolor="red" title="{{__('messages.alert')}}" subtitle="{{__('messages.addalert')}}" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="New Alert" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.completeform')}}
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="alert_type" value="{{ __(' Alert Type') }}" />


                            <x-input id="alert_type" type="text" class="block w-full mt-1" wire:model="" autocomplete="" />
                            <x-input-error for="alert_type" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Tenant" value="{{ __(' Tenant') }}" />
                            <x-input id="Tenant" type="text" class="block w-full mt-1" wire:model="" autocomplete="tenant" />
                            <x-input-error for="Tenant" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Name" value="{{ __(' Name') }}" />
                            <x-input id="Name" type="text" class="block w-full mt-1" wire:model="contact.contact_name" autocomplete="name" />
                            <x-input-error for="Name" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="Address" value="{{ __(' Address') }}" />
                            <x-input id="Address" type="text" class="block w-full mt-1" wire:model="" autocomplete="" />
                            <x-input-error for="Address" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-end pt-6">
                    <x-theme.button wire="updateAlert">{{__('messages.savealert')}}</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
