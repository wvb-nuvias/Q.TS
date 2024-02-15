<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header9.jpg">
            <x-theme.headericon icon="user-tag" title="Role Management" subtitle="CRUD for Roles" color="orange" />
        </x-header>
        <x-panel title="List">
            <x-panel.subtitle extracss="-mt-4">
                These are all the roles, troughout the application
            </x-panel.subtitle>

        </x-panel>
    </div>
</div>
