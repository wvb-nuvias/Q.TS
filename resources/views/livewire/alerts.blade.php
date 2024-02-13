<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header4.jpg">
            <x-theme.headericon icon="bell" title="Alerts" subtitle="CRUD for Alerts" color="red" />
        </x-header>
    </div>
</div>
