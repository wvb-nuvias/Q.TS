<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header2.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="building-user" title="Contacts" subtitle="CRUD for Contacts" color="purple" />
                </div>
                <div class="flex flex-row-reverse w-2/3">

                </div>
            </div>
        </x-header>
        <x-panel title="New Contact" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Please complete the form
            </x-panel.subtitle>
            <div class="flex-auto pt-4 space-y-3">
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

            </div>
            <div class="flex flex-wrap justify-end pt-6">
                <x-theme.button wire="updatecontact">Save Contact</x-theme.button>
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Contacts" />
            </div>
        @endif
    </div>
</div>
