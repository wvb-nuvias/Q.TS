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
    <x-panel title="New {{ $title }}" extracss="mt-6">
        <x-panel.subtitle extracss="-mt-4">
            Please complete the form
        </x-panel.subtitle>
        <div class="flex-auto pt-4 space-y-3">
            {{ $content }}
        </div>
        <div class="flex flex-wrap justify-end pt-6">
            <x-theme.button wire="update{{ $title }}">Save {{ $title }}</x-theme.button>
        </div>
    </x-panel>
    @if ($user->hasright('VIEW_LOG'))
        <div class="pt-6">
            <livewire:log-panel source="{{ $title }}s" />
        </div>
    @endif
</div>
