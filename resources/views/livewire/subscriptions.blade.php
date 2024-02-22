<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header3.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="file-contract" title="Subscriptions" subtitle="CRUD for Subscriptions" color="amber" />
                </div>
                <div class="flex flex-row-reverse w-2/3">
                    <livewire:brand-selector :selected="$selectedbrand" />
                </div>
            </div>
        </x-header>
        <x-panel title="List" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the subscriptions based on selected filters
            </x-panel.subtitle>

        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Subscriptions" />
            </div>
        @endif
    </div>
</div>
