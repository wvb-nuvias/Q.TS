<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header4.jpg">
            <x-theme.headericon icon="server" title="Devices" subtitle="CRUD for Devices" color="cyan" />
        </x-header>
    </div>
</div>
