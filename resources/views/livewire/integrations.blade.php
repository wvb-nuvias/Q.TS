<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header4.jpg" icon="code-compare" iconcolor="cyan" title="{{__('messages.integrations')}}" subtitle="{{__('messages.integrationsubtitle')}}" :user="$user">
        <x-slot name="header">
            <x-theme.iconbutton mode="settings" icon="code-compare" color="cyan" wire="switchmode('settings')" title="Settings" />
        </x-slot>
        <x-slot name="content">
            <x-panel title="{{__('messages.integrationsactive')}}" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.listintegrationsactive')}}
                </x-panel.subtitle>
                <div class="w-full px-6 pt-6 mx-auto space-y-6">
                    <div class="flex flex-wrap -mx-3">
                        @foreach ($active_integrations as $integration)
                        <div class="w-full px-3 pt-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                            <livewire:integration-tile :integration="$integration" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </x-panel>
            <x-panel title="{{__('messages.integrationsinactive')}}" extracss="mt-6 opacity-20 hover:opacity-100">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.listintegrationsinactive')}}
                </x-panel.subtitle>
                <div class="w-full px-6 pt-6 mx-auto space-y-6">
                    <div class="flex flex-wrap -mx-3">
                        @foreach ($inactive_integrations as $integration)
                        <div class="w-full px-3 pt-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                            <livewire:integration-tile :integration="$integration" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>

