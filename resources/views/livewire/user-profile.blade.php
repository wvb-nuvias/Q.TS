<div>
    <div class="w-full px-6 py-6 mx-auto">
        <x-panel title="">
            <div class="flex flex-wrap items-center justify-center -mx-3 pt-1">
                <div class="w-4/12 max-w-full px-3 flex-0 sm:w-auto">
                    <div class="relative inline-flex items-center justify-center text-base text-white transition-all duration-200 ease-in-out w-19 h-19 rounded-xl">
                        <img class="w-full shadow-sm rounded-xl" src="../../../assets/img/team-3.jpg" alt="bruce">
                    </div>
                </div>
                <div class="w-8/12 max-w-full px-3 my-auto flex-0 sm:w-auto">
                    <div class="h-full">
                        <h5 class="mb-1 font-bold dark:text-white">{{ $user->name }}</h5>
                        <p class="mb-0 text-sm font-semibold leading-normal">{{ $user->job->name }} - {{ $user->role->name }}</p>
                    </div>
                </div>
                <div class="flex max-w-full px-3 mt-4 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                    <label profile-visibility-toggle-label="" for="profile-visibility" class="inline-block mb-0 ml-1 text-sm font-normal cursor-pointer select-none text-slate-700 dark:text-white/80">
                        <small>Switch to invisible</small>
                    </label>
                    <div class="min-h-6 ml-2 mb-0 block pl-12">
                        <input checked="" profile-visibility-toggle="" id="profile-visibility" class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 mt-0.5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox">
                    </div>
                </div>
            </div>
        </x-panel>
        <x-panel title="Basic Info">
            test
        </x-panel>
    </div>
</div>
