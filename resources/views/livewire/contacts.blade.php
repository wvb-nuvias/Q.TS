<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header5.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="building-user" title="Contacts" subtitle="CRUD for Contacts" color="purple" />
                </div>
                <div class="flex flex-row-reverse w-2/3">
                    <x-theme.iconbutton icon="building-user" color="purple" wire="switchmode('add')" title="Add Contact" />
                    <livewire:contact-type-selector :selected="$selectedtypes" />
                </div>
            </div>
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the contacts based on selected filters
            </x-panel.subtitle>
            <div class="pt-6 text-sm">
                @livewire('contacts-table', ['selectedtypes' => $selectedtypes ,'user' => $user])
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Contacts" />
            </div>
        @endif
    </div>
</div>
