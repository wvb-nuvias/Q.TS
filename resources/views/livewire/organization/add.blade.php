<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header2.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="building" title="Organization" subtitle="Add an Organization" color="emerald" />
                </div>
                <div class="flex flex-row-reverse w-2/3">

                </div>
            </div>
        </x-header>
        <x-panel title="New Organization" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Please complete the form
            </x-panel.subtitle>
            <div class="flex-auto pt-4 space-y-3">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="OrganizationType" value="{{ __(' Organization Type') }}" />
                        <x-input id="OrganizationType" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                        <x-input-error for="OrganizationType" class="mt-2" />
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
                        <x-input id="Name" type="text" class="mt-1 block w-full" wire:model="organization.name" autocomplete="name" />
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
                <x-theme.button wire="updateorganization">Save Organization</x-theme.button>
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Organizations" />
            </div>
        @endif
    </div>
</div>
