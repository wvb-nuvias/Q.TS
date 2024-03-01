<x-dialog-modal wire:model.live="showAddressSelectorModal">
    <x-slot name="title">
        <div class="text-md">Address Selector</div>
    </x-slot>
    <x-slot name="content">
        <div class="flex-auto space-y-3 ">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 flex-0">
                    <x-label for="address_type_id" value="{{ __('Select Type') }}" />
                    <x-simple-select
                        wire:model="address.address_type_id"
                        name="address_type_id"
                        id="address_type_id"
                        :options="$address_types"
                        value-field='id'
                        text-field='address_type_name'
                        placeholder="Select Type"
                        search-input-placeholder="Search Type"
                        :searchable="true"
                        class="form-select border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    >
                        <x-slot name="customOption">
                            <div class="h-10 flex flex-row opacity-50 hover:opacity-100 w-full bg-emerald-600 bg-opacity-50 cursor-pointer">
                                <div class="flex h-10 justify-center w-10 mt-2 pr-2 pl-2">
                                    <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" :color="'${ option.address_type_color }'" :icon="'${ option.address_type_icon }'" />
                                </div>
                                <div class="flex flex-col">
                                    <div x-text="option.address_type_name" class="text-md"></div>
                                    <div x-text="option.address_type_icon" class="text-xs -mt-1"></div>
                                </div>
                            </div>
                        </x-slot>
                    </x-simple-select>
                    <x-input-error for="SavedImports" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 flex-0">
                    <x-label for="street" value="{{ __(' Street') }}" />
                    <x-input id="street" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.street" autocomplete="street" placeholder="Enter street" />
                    <x-input-error for="street" class="mt-2" />
                </div>
                <div class="w-2/12 max-w-full px-3 flex-0">
                    <x-label for="number" value="{{ __(' Number') }}" />
                    <x-input id="number" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.number" autocomplete="number" placeholder="Enter number" />
                    <x-input-error for="number" class="mt-2" />
                </div>
                <div class="w-2/12 max-w-full px-3 flex-0">
                    <x-label for="apartment" value="{{ __(' Apartment') }}" />
                    <x-input id="apartment" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.apartment" autocomplete="apartment" placeholder="Enter apartment" />
                    <x-input-error for="apartment" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-3/12 max-w-full px-3 flex-0">
                    <x-label for="postal" value="{{ __(' Postal') }}" />
                    <x-input id="postal" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.postal" autocomplete="postal" placeholder="Enter postal" />
                    <x-input-error for="postal" class="mt-2" />
                </div>
                <div class="w-9/12 max-w-full px-3 flex-0">
                    <x-label for="city" value="{{ __(' City') }}" />
                    <x-input id="city" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.city" autocomplete="city" placeholder="Enter city" />
                    <x-input-error for="city" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="region" value="{{ __('Region') }}" />
                    <x-input id="region" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.region" autocomplete="region" placeholder="Enter region" />
                    <x-input-error for="region" class="mt-2" />
                </div>
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="country" value="{{ __(' Country') }}" />
                    <x-input id="country" type="text" class="text-sm block w-full mt-1 placeholder-gray-500" wire:model="address.country" autocomplete="country" placeholder="Enter country" />
                    <x-input-error for="country" class="mt-2" />
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="flex space-x-3">
        <x-theme.button wire="maptest()">Map Test</x-theme.button>
        <x-theme.button wire="save()">Save</x-theme.button>
        <x-theme.button wire="cancel()">Cancel</x-theme.button>
        </div>
    </x-slot>
</x-dialog-modal>
