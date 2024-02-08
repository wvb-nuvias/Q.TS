<div>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="h-80 rounded-xl" style="background-position: -100px -300px; background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
            <div class="opacity-50 h-80 w-full bg-gradient-to-tl from-{{$user->setting('themecolor1')}} to-{{$user->setting('themecolor2')}} rounded-xl"></div>
        </div>
        <div class="-mt-9 w-11/12 mx-auto">
        <x-panel title="">
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
        </x-panel>
        </div>
        <x-panel title="Basic Info">
            <div class="flex-auto pt-0">
                <form wire:submit='update'>
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
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80" for="location">Location</label>
                            <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                <input value="{{ $user->organisation->address->tostring() }}" type="text" name="location" placeholder="here comes the address" class="focus:shadow-primary-outline dark:bg-slate-850 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 pt-3">
                        <div class="w-6/12 max-w-full px-3 flex-0">

                        </div>
                        <div class="w-6/12 max-w-full px-3 flex-0">
                            <x-map :address="$user->organisation->address"/>
                        </div>
                    </div>

                    <div class="flex flex-wrap pt-3">
                        <button type="submit" aria-controls="address" next-form-btn="" href="javascript:;" class="inline-block px-6 py-3 mb-0 ml-auto text-xs font-bold text-right text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 bg-gradient-to-tl from-zinc-800 to-zinc-700 leading-pro tracking-tight-rem bg-150 bg-x-25">Save Changes</button>
                    </div>
                </form>
            </div>
        </x-panel>
    </div>
</div>
