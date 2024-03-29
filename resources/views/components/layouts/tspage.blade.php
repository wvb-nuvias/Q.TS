<div>

<div class="w-full px-6 py-6 mx-auto">
    @include('components.flash-messages')
    <x-header themecolor1="{{ $themecolor1 }}" themecolor2="{{ $themecolor2 }}" url="{{ $themeheader }}">
        <div class="flex flex-row w-full">
            <div class="w-2/3">
                <x-theme.headericon icon="{{ $icon }}" title="{{ $title }}" subtitle="{{ $subtitle }}" color="{{ $iconcolor }}" />
            </div>
            <div class="flex flex-row-reverse w-2/3">
                {{ $header }}
            </div>
        </div>
    </x-header>

    {{ $content }}

    @if ($user->hasright('VIEW_LOG') && !($title=='Integration' && str_contains($subtitle,'Setting')))
    <!-- Exception for Integrations Settings, that crashes when log panel is shown? why? -->
    <div class="pt-6">
        <livewire:logs.log-panel source="{{ $title }}" />
    </div>
    @endif

    @script
    <script>
        $wire.on('alert_remove',()=> {
            setTimeout(function() {
                $(".alert").fadeOut('fast');
            }, 4000);
        });

        $wire.on('refresh_map',()=> {

            alert('ok');

            //enablemap(lat,lng);
        });

    </script>
    @endscript

</div>

</div>
