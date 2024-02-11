<div>
    <div class="w-full px-6 py-6 mx-auto">
        <x-header themecolor1="{{$user->setting('themecolor1')}}" themecolor2="{{$user->setting('themecolor2')}}" url="img/header/header6.jpg">
            <div class="flex flex-wrap items-center justify-center -mx-3 pt-6">
                <div class="w-4/12 max-w-full px-3 flex-0 sm:w-auto">
                    <div class="relative inline-flex items-center justify-center text-base text-white transition-all duration-200 ease-in-out w-19 h-19 rounded-xl">
                        <img class="w-full shadow-sm rounded-xl" src="https://gravatar.com/avatar/{{$gravatarhash}}" alt="{{ $user->name }}">
                    </div>
                </div>
                <div class="w-8/12 max-w-full px-3 my-auto flex-0 sm:w-auto">
                    <div class="h-full">
                        <h5 class="mb-1 font-bold dark:text-white">{{ $user->fullname() }}</h5>
                        <p class="mb-0 text-sm font-semibold leading-normal">{{ $user->job->name }} - {{ $user->role->name }}</p>
                    </div>
                </div>
                <div class="flex max-w-full px-3 mt-4 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">

                </div>
            </div>
        </x-header>
        <x-panel title="Basic Info">
            <x-panel.subtitle extracss="-mt-4">
                These are your profile details
            </x-panel.subtitle>
            <div class="flex-auto pt-4">

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80" for="First Name">First Name</label>
                            <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                <input type="text" name="First Name" wire:model="user.firstname" placeholder="Alec" class="focus:shadow-primary-outline dark:bg-slate-850 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80" for="Last Name">Last Name</label>
                            <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                <input type="text" name="Last Name" wire:model="user.name" placeholder="Thompson" class="focus:shadow-primary-outline dark:bg-slate-850 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80" for="Email">Email</label>
                            <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                <input type="email" name="Email" wire:model="user.email" placeholder="example@email.com" class="focus:shadow-primary-outline dark:bg-slate-850 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80" for="Phone Number">Phone Number</label>
                            <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                <input type="tel" name="Phone Number" wire:model="user.phone" placeholder="+40 735 631 620" class="focus:shadow-primary-outline dark:bg-slate-850 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">

                        </div>
                        <div class="w-5/12 max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80" for="location">Location</label>
                            <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                <input value="{{ $user->organisation->address->tostring() }}" type="text" name="location" placeholder="here comes the address" class="focus:shadow-primary-outline dark:bg-slate-850 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                        <x-theme.button extracss="h-10 self-end">Change</x-theme.button>
                    </div>
                    <div class="flex flex-wrap -mx-3 pt-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">

                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-map :address="$user->organisation->address"/>
                        </div>
                    </div>

                    <div class="flex flex-wrap pt-3 justify-end">
                        <x-theme.button wire="update">Save Changes</x-theme.button>
                    </div>
            </div>
        </x-panel>
    </div>
</div>
