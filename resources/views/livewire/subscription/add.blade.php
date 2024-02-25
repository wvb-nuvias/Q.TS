<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header2.jpg">
            <div class="flex flex-row w-full">
                <div class="w-2/3">
                    <x-theme.headericon icon="file-contract" title="Subscription" subtitle="Add a Subscription" color="amber" />
                </div>
                <div class="flex flex-row-reverse w-2/3">

                </div>
            </div>
        </x-header>
        <x-panel title="New Subscription" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Please complete the form
            </x-panel.subtitle>
            <div class="flex-auto pt-4 space-y-3">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="SubscriptionType" value="{{ __(' Subscription Type') }}" />
                        <x-input id="SubscriptionType" type="text" class="mt-1 block w-full" wire:model="" autocomplete="" />
                        <x-input-error for="SubscriptionType" class="mt-2" />
                    </div>
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="Tenant" value="{{ __(' Tenant') }}" />
                        <x-input id="Tenant" type="text" class="mt-1 block w-full" wire:model="" autocomplete="tenant" />
                        <x-input-error for="Tenant" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="Name" value="{{ __(' Name') }}" />
                        <x-input id="Name" type="text" class="mt-1 block w-full" wire:model="subscription.name" autocomplete="name" />
                        <x-input-error for="Name" class="mt-2" />
                    </div>

                </div>

            </div>
            <div class="flex flex-wrap justify-end pt-6">
                <x-theme.button wire="updatesubscriptions">Save Subscription</x-theme.button>
            </div>
        </x-panel>
        @if ($user->hasright('VIEW_LOG'))
            <div class="pt-6">
                <livewire:log-panel source="Subscriptions" />
            </div>
        @endif
    </div>
</div>
