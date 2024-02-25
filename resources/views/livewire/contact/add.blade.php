<div>
    <x-layouts.add themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header2.jpg" icon="building-user" iconcolor="purple" title="Contact" subtitle="Add a Contact" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <div class="flex flex-wrap -mx-3">
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="contact_type" value="{{ __(' Contact Type') }}" />

                    <select id="contact_type" class="form-control mt-1 block w-full" name="ContactType" wire:model="contact.contact_type_id">
                        <option value="">Select Contact Type</option>
                        @foreach ($contacttypes as $contact_type)
                            <option value="{{ $contact_type->id }}">{{ $contact_type->contact_type_name }}</option>
                        @endforeach
                    </select>
                    <x-input id="contact_type" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                    <x-input-error for="contact_type" class="mt-2" />
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
                    <x-input id="Name" type="text" class="mt-1 block w-full" wire:model="contact.contact_name" autocomplete="name" />
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
