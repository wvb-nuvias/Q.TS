<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header7.jpg">
            <x-theme.headericon icon="list" title="User Management" subtitle="CRUD for Users" color="blue" />
        </x-header>
        <x-panel title="List">
            <x-panel.subtitle extracss="-mt-4">
                These are all the users based on selected filters
            </x-panel.subtitle>

        </x-panel>
    </div>
</div>
