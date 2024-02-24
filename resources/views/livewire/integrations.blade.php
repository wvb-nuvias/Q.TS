<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header4.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="code-compare" title="Integrations" subtitle="Integrations" color="cyan" />
                </div>
                <div class="flex flex-row-reverse w-2/3">

                </div>
            </div>
        </x-header>
        <x-panel title="Active Integrations" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the current active integrations
            </x-panel.subtitle>
            <div class="w-full px-6 mx-auto space-y-6 pt-6">
                <div class="flex flex-wrap -mx-3">
                    @foreach ($active_integrations as $integration)
                    <div class="w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <livewire:integration-tile :integration="$integration" />
                    </div>
                    @endforeach
                </div>
            </div>
        </x-panel>
        <x-panel title="Inactive Integrations" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are all the current inactive integrations
            </x-panel.subtitle>
            <div class="w-full px-6 mx-auto space-y-6 pt-6">
                <div class="flex flex-wrap -mx-3">
                @foreach ($inactive_integrations as $integration)
                <div class="w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <livewire:integration-tile :integration="$integration" />
                </div>
                @endforeach
                </div>
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Devices" />
            </div>
        @endif
    </div>
</div>

