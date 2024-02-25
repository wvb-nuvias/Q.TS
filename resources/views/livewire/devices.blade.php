<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header4.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="server" title="Devices" subtitle="CRUD for Devices" color="cyan" />
                </div>
                <div class="flex flex-row-reverse w-2/3">
                    <x-theme.iconbutton icon="server" color="cyan" wire="switchmode('add')" title="Add Device" />
                    <livewire:device-type-selector :selected="$selectedtypes" />
                    <livewire:brand-selector :selected="$selectedbrand" />
                </div>
            </div>
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the devices based on selected filters
            </x-panel.subtitle>
            <div class="pt-6 text-sm">
                @livewire('devices-table', ['selectedtypes' => $selectedtypes, 'selectedbrand' => $selectedbrand, 'user' => $user])
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Devices" />
            </div>
        @endif
    </div>
</div>
