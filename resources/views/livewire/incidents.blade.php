<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header1.jpg">
            <x-theme.headericon icon="ambulance" title="Incidents" subtitle="CRUD for Incidents" color="emerald" />
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the incidents based on selected filters
            </x-panel.subtitle>

        </x-panel>
    </div>
</div>
