<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header1.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="ambulance" title="Incidents" subtitle="CRUD for Incidents" color="emerald" />
                </div>
                <div class="flex flex-row-reverse w-2/3">
                    <livewire:incident-status-selector :selected="$selectedstatus" />
                    <livewire:brand-selector :selected="$selectedbrand" />
                </div>
            </div>
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the incidents based on selected filters
            </x-panel.subtitle>
            <div class="pt-6 text-sm">
                @livewire('incidents-table', ['selectedstatus' => $selectedstatus, 'selectedbrand' => $selectedbrand, 'user' => $user])
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Incidents" />
            </div>
        @endif
    </div>
</div>
