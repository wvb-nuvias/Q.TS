<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header2.jpg">
            <x-theme.headericon icon="building" title="Organizations" subtitle="CRUD for Organizations" color="emerald" />
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the organizations based on selected filters
            </x-panel.subtitle>

        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Organizations" />
            </div>
        @endif
    </div>
</div>
