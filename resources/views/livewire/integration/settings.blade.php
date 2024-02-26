<div>
    <x-layouts.tspage themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" themeheader="img/header/header4.jpg" icon="code-compare" iconcolor="cyan" title="{{__('messages.integration')}}" subtitle="{{__('messages.integrationsettings')}}" :user="$user">
        <x-slot name="header">

        </x-slot>
        <x-slot name="content">
            <x-panel title="Integrations Settings" extracss="mt-6">
                <x-panel.subtitle extracss="-mt-4">
                    {{__('messages.listsettings')}}
                </x-panel.subtitle>
                <div class="flex-auto pt-4 space-y-3">

                </div>
                <div class="flex flex-wrap justify-end pt-6">
                    <x-theme.button wire="updateIntegration">{{__('messages.savesettings')}}</x-theme.button>
                </div>
            </x-panel>
        </x-slot>
    </x-layouts.tspage>
</div>
