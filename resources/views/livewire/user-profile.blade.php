<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header6.jpg">
            <!-- TODO click on header icon , forward to gravatar.com -->
            <x-theme.headericon url="https://gravatar.com/avatar/{{$gravatarhash}}" title="{{ $user->fullname() }}" subtitle="{{ $user->job->name }} - {{ $user->role->name }}" />
        </x-header>
        <x-panel title="Basic Info" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                These are your profile details
            </x-panel.subtitle>
            <div class="flex-auto pt-4 space-y-6">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="First Name" value="{{ __('First Name') }}" />
                        <x-input id="First Name" type="text" class="mt-1 block w-full" wire:model="user.firstname" autocomplete="firstname" />
                        <x-input-error for="First Name" class="mt-2" />
                    </div>
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="Last Name" value="{{ __('Last Name') }}" />
                        <x-input id="Last Name" type="text" class="mt-1 block w-full" wire:model="user.name" autocomplete="name" />
                        <x-input-error for="Last Name" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="Email" value="{{ __('Email') }}" />
                        <x-input id="Email" type="email" class="mt-1 block w-full" wire:model="user.email" autocomplete="email" />
                        <x-input-error for="Email" class="mt-2" />
                    </div>
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-label for="Phone Number" value="{{ __('Phone Number') }}" />
                        <x-input id="Phone Number" type="tel" class="mt-1 block w-full" wire:model="user.phone" autocomplete="phone" />
                        <x-input-error for="Phone Number" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">

                    </div>
                    <div class="w-5/12 max-w-full px-3 flex-0">
                        <x-label for="location" value="{{ __('Location') }}" />
                        <x-input id="location" type="text" class="mt-1 block w-full" value="{{ $user->organisation->address->tostring() }}" />
                        <x-input-error for="location" class="mt-2" />
                    </div>
                    <x-theme.button extracss="h-10 self-end">Change</x-theme.button>
                </div>
                <div class="flex flex-wrap pt-3 -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">

                    </div>
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <x-map :address="$user->organisation->address"/>
                    </div>
                </div>

                <div class="flex flex-wrap justify-end pt-3">
                    <x-theme.button wire="updateprofile">Save</x-theme.button>
                </div>
            </div>
        </x-panel>
        <x-panel title="Update Password" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Ensure your account is using a long, random password to stay secure.
            </x-panel.subtitle>

            @livewire('profile.update-password-form')
        </x-panel>
        <x-panel title="Two Factor Authentication" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Add additional security to your account using two factor authentication.
            </x-panel.subtitle>

            @livewire('profile.two-factor-authentication-form')
        </x-panel>
        <x-panel title="Browser Settings" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Manage and log out your active sessions on other browsers and devices.
            </x-panel.subtitle>

            @livewire('profile.logout-other-browser-sessions-form')
        </x-panel>
        <x-panel title="Delete Account" extracss="mt-6">
            <x-panel.subtitle extracss="-mt-4">
                Permanently delete your account.
            </x-panel.subtitle>

            @livewire('profile.delete-user-form')
        </x-panel>
    </div>
</div>


