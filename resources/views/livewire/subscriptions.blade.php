<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header3.jpg">
            <x-theme.headericon icon="file-contract" title="Subscriptions" subtitle="CRUD for Subscriptions" color="amber" />
        </x-header>
        <x-panel title="List">
            <x-panel.subtitle extracss="-mt-4">
                These are all the subscriptions based on selected filters
            </x-panel.subtitle>

        </x-panel>
    </div>
</div>
