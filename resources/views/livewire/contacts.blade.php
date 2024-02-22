<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header5.jpg">
            <x-theme.headericon icon="building-user" title="Contacts" subtitle="CRUD for Contacts" color="purple" />
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the contacts based on selected filters
            </x-panel.subtitle>

        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Contacts" />
            </div>
        @endif
    </div>
</div>
