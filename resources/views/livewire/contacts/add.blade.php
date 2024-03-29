<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header5.jpg" icon="building-user" iconcolor="purple" title="{{__('messages.contacts')}}" subtitle="{{__('messages.addcontact')}}" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="New Contact" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.completeform')}}
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">
                    <div class="flex flex-wrap -mx-3">
                        @if (in_array("VIEW_TENANT", $rights))
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Tenant') }}" />
                            <x-simple-select
                                wire:model="tenant_id"
                                name="tenant_id"
                                id="tenant_id"
                                :options="$tenants"
                                value-field='id'
                                text-field='tenant_name'
                                placeholder="Select Tenant"
                                search-input-placeholder="Search Tenant"
                                :searchable="true"
                                class="border-gray-300 rounded-md shadow-sm form-select dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            >
                                <x-slot name="customOption">
                                    <div class="flex flex-row w-full h-10 bg-opacity-50 opacity-50 cursor-pointer hover:opacity-100 bg-emerald-600">
                                        <div class="flex justify-center w-10 h-10 pl-2 pr-2 mt-2">
                                            <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" :color="'${ option.tenant_color }'" :icon="'${ option.tenant_icon }'" />
                                        </div>
                                        <div class="flex flex-col">
                                            <div x-text="option.tenant_name" class="text-md"></div>
                                            <div x-text="option.tenant_icon" class="-mt-1 text-xs"></div>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-simple-select>
                            <x-input-error for="tenant_id" class="mt-2" />
                        </div>
                        @else
                        <div class="w-6/12 max-w-full px-3 flex-0">
                        </div>
                        @endif

                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Last Name') }}" />
                            <x-input id="LastName" type="text" class="block w-full h-10 mt-1 text-sm placeholder-gray-500 dark:text-gray-400" wire:model="lastname" autocomplete="lastname" />
                            <x-input-error for="LastName" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Organization') }}" />
                            <x-simple-select
                                wire:model="organization_id"
                                name="organization_id"
                                id="organization_id"
                                :options="$organizations"
                                value-field='id'
                                text-field='name'
                                placeholder="Select Organization"
                                search-input-placeholder="Search Organization"
                                :searchable="true"
                                class="border-gray-300 rounded-md shadow-sm form-select dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            >
                            <x-slot name="customOption">
                                <div class="flex flex-row w-full h-10 bg-blue-600 bg-opacity-50 opacity-50 cursor-pointer hover:opacity-100">
                                    <div class="flex justify-center w-10 h-10 pl-2 pr-2 mt-2">
                                        <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" color="${option.organization_type_color}" icon="option.organization_type_icon" />
                                    </div>
                                    <div class="flex flex-col">
                                        <div x-text="option.name" class="text-md"></div>
                                        <div x-text="option.organization_type_name" class="-mt-1 text-xs"></div>
                                    </div>
                                </div>
                            </x-slot>
                            </x-simple-select>
                            <x-input-error for="contact_type_id" class="mt-2" />
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' First Name') }}" />
                            <x-input id="FirstName" type="text" class="block w-full h-10 mt-1 text-sm placeholder-gray-500 dark:text-gray-400" wire:model="firstname" autocomplete="firstname" />
                            <x-input-error for="FirstName" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-label value="{{ __(' Contact Type') }}" />
                            <x-simple-select
                                wire:model="contact_type_id"
                                name="contact_type_id"
                                id="contact_type_id"
                                :options="$contacttypes"
                                value-field='id'
                                text-field='contact_type_name'
                                placeholder="Select Contact Type"
                                search-input-placeholder="Search Contact Type"
                                :searchable="true"
                                class="border-gray-300 rounded-md shadow-sm form-select dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            >
                                <x-slot name="customOption">
                                    <div class="flex flex-row w-full h-10 bg-purple-600 bg-opacity-50 opacity-50 cursor-pointer hover:opacity-100">
                                        <div class="flex justify-center w-10 h-10 pl-2 pr-2 mt-2">
                                            <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" color="${option.contact_type_color}" icon="option.contact_type_icon" />
                                        </div>
                                        <div class="flex flex-col">
                                            <div x-text="option.contact_type_name" class="text-md"></div>
                                            <div x-text="option.contact_type_icon" class="-mt-1 text-xs"></div>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-simple-select>
                            <x-input-error for="contact_type_id" class="mt-2" />
                        </div>
                        <div class="flex flex-row w-6/12 max-w-full px-3 flex-0">
                            <div class="w-10/12">
                                <x-label value="{{ __(' Address') }}" />
                                <x-simple-select
                                    wire:model="address_id"
                                    name="contact_address_id"
                                    id="contact_address_id"
                                    :options="$addresses"
                                    value-field='id'
                                    text-field='full'
                                    placeholder="Select Address"
                                    search-input-placeholder="Search Address"
                                    :searchable="true"
                                    class="border-gray-300 rounded-md shadow-sm form-select dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                >
                                <x-slot name="customOption">
                                    <div class="flex flex-row w-full h-10 bg-opacity-50 opacity-50 cursor-pointer hover:opacity-100">
                                        <div class="flex flex-col ml-2">
                                            <div class="flex flex-row">
                                                <div x-text="option.street" class="mr-2 text-md"></div>
                                                <div x-text="option.number" class="text-md"></div>
                                            </div>
                                            <div class="flex flex-row -mt-1">
                                                <div x-text="option.postal" class="mr-2 text-xs"></div>
                                                <div x-text="option.city" class="text-xs"></div>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot>
                                </x-simple-select>
                                <x-input-error for="contact_address_id" class="mt-2" />
                            </div>
                            <div class="flex flex-wrap justify-end w-2/12 pl-3">
                                <x-theme.button wire="openAddressSelectorModal" extracss="h-10 self-end">Change</x-theme.button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <div class="flex flex-col w-full">
                                <div class="mb-3">
                                    <x-label value="{{ __(' Function') }}" />
                                    <x-simple-select
                                        wire:model="job_id"
                                        name="job_id"
                                        id="job_id"
                                        :options="$jobs"
                                        value-field='id'
                                        text-field='job_name'
                                        placeholder="Select Job"
                                        search-input-placeholder="Search Job"
                                        :searchable="true"
                                        class="border-gray-300 rounded-md shadow-sm form-select dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    >
                                    </x-simple-select>
                                    <x-input-error for="job_id" class="mt-2" />
                                </div>
                                <div>
                                    <x-label value="{{ __(' Language') }}" />
                                    <x-simple-select
                                        wire:model="language"
                                        name="language_code"
                                        id="language_code"
                                        :options="$languages"
                                        value-field='language_code'
                                        text-field='language_name'
                                        placeholder="Select Language"
                                        search-input-placeholder="Search Language"
                                        :searchable="true"
                                        class="border-gray-300 rounded-md shadow-sm form-select dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    >
                                    </x-simple-select>
                                    <x-input-error for="language_code" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">

                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-end pt-6 space-x-3">
                    <x-theme.button wire="cancel">{{__('messages.cancel')}}</x-theme.button>
                    <x-theme.button wire="openImportModal">{{__('messages.import')}}</x-theme.button>
                    <x-theme.button wire="saveContact">{{__('messages.savecontact')}}</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
    <livewire:components.address-modal :user="$user" />
    <livewire:imports.imports destination="Contact" />
    @if ($address->lat!=null)
        @script
        <script>
                lat={{$address->lat}};
                lng={{$address->lng}};

                setTimeout(function() {
                    if (lat)
                    {
                        enablemap(lat,lng);
                    }
                }, 500);
            }
        </script>
        @endscript
    @endif
</div>
