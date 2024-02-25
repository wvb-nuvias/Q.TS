<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header4.jpg" icon="code-compare" iconcolor="cyan" title="Integrations" subtitle="Integration Settings" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="Integrations Settings" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    All Enabled Integrations Settings will be here
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">

                </div>
                <div class="flex flex-wrap justify-end pt-6">
                    <x-theme.button wire="updateIntegration">Save Settings</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
