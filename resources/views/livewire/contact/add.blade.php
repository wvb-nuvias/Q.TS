<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header5.jpg" icon="building-user" iconcolor="purple" title="{{__('messages.contact')}}" subtitle="{{__('messages.addcontact')}}" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="New Contact" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.completeform')}}
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label for="contact_type" value="{{ __(' Contact Type') }}" />

                            <select id="contact_type" class="block w-full mt-1 form-control" name="ContactType" wire:model="contact.contact_type_id">
                                <option value="">Select Contact Type</option>
                                @foreach ($contacttypes as $contact_type)
                                    <option value="{{ $contact_type->id }}">{{ $contact_type->contact_type_name }}</option>
                                @endforeach
                            </select>
                            <x-input id="contact_type" type="text" class="block w-full mt-1" wire:model="" autocomplete="" />
                            <x-input-error for="contact_type" class="mt-2" />
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
                    <x-theme.button wire="updateContact">{{__('messages.savecontact')}}</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
