<div>
    <div class="w-full px-6 py-6 mx-auto">
        @include('components.flash-messages')
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header6.jpg">
            <!-- TODO click on header icon , forward to gravatar.com -->
            <x-theme.headericon url="https://gravatar.com/avatar/{{$gravatarhash}}" title="{{ $user->fullname() }}" subtitle="{{ $user->job->name }} - {{ $user->role->name }}" />
        </x-header>
        <x-panel title="Basic Info">
            <x-panel.subtitle extracss="-mt-4">
                These are your profile details
            </x-panel.subtitle>
            <div class="flex-auto pt-4">
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
                    <x-theme.button wire="update">Save</x-theme.button>
                </div>
            </div>
        </x-panel>
        <x-panel title="Update Password">
            <x-panel.subtitle extracss="-mt-4">
                Ensure your account is using a long, random password to stay secure.
            </x-panel.subtitle>
            <div class="flex-auto pt-4">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-6/12 max-w-full px-3 flex-0">

                    </div>
                    <div class="w-6/12 max-w-full px-3 flex-0">
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="current_password" value="{{ __('Current Password') }}" />
                            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
                            <x-input-error for="current_password" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="password" value="{{ __('New Password') }}" />
                            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
                            <x-input-error for="password" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
                            <x-input-error for="password_confirmation" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-end pt-3">
                    <x-theme.button wire="updatepassword">Save</x-theme.button>
                </div>
            </div>
        </x-panel>
        <x-panel title="Two Factor Authentication">
            <x-panel.subtitle extracss="-mt-4">
                Add additional security to your account using two factor authentication.
            </x-panel.subtitle>
            <div class="flex-auto pt-4">
                <div class="flex flex-wrap -mx-3">
                    <!-- TODO add two factor form -->
                </div>
            </div>
        </x-panel>
        <x-panel title="Browser Settings">
            <x-panel.subtitle extracss="-mt-4">
                Manage and log out your active sessions on other browsers and devices.
            </x-panel.subtitle>
            <div class="flex-auto pt-4">
                <div class="flex flex-wrap -mx-3">
                    <!-- TODO add active sessions form -->
                </div>
            </div>
        </x-panel>
        <x-panel title="Delete Account">
            <x-panel.subtitle extracss="-mt-4">
                Permanently delete your account.
            </x-panel.subtitle>
            <div class="flex-auto pt-4">
                <div class="flex flex-wrap -mx-3">
                    <!-- TODO add delete account form -->
                </div>
            </div>
        </x-panel>
    </div>
</div>


