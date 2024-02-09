<div fixed-plugin>
    <a fixed-plugin-button class="fixed px-4 py-2 text-xl bg-white shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-circle text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog" aria-hidden="true"> </i>
    </a>

    <div fixed-plugin-card class="z-sticky backdrop-blur-2xl backdrop-saturate-200 dark:bg-slate-850/80 shadow-3xl w-90 ease fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 duration-200 -right-90">
        <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
            <div class="float-left">
                <h5 class="mt-4 mb-0 dark:text-white">User Settings</h5>
                <p class="dark:text-white dark:opacity-80">See our dashboard options.</p>
            </div>
            <div class="float-right mt-6">
                <button fixed-plugin-close-button class="inline-block p-0 mb-4 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
        <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4 ps">
            <div>
                <h6 class="mb-0 dark:text-white">Theme Color 1</h6>
            </div>
            <a href="javascript:void(0)">
                <div class="my-2 text-left" sidenav-colors>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-500 to-violet-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" active-color="" data-color="blue" wire:click="savesetting('themecolor1','blue-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="gray" wire:click="savesetting('themecolor1','gray-500')""></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-700 to-blue-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="cyan" wire:click="savesetting('themecolor1','cyan-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-green-500 to-green-200 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="emerald" wire:click="savesetting('themecolor1','emerald-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-orange-500 to-yellow-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="orange" wire:click="savesetting('themecolor1','orange-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-red-600 to-orange-600 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="red" wire:click="savesetting('themecolor1','red-500')"></span>
                </div>
            </a>
            <div>
                <h6 class="mb-0 dark:text-white">Theme Color 2</h6>
            </div>
            <a href="javascript:void(0)">
                <div class="my-2 text-left" sidenav-colors>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-500 to-violet-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" active-color="" data-color="blue" wire:click="savesetting('themecolor2','blue-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="gray" wire:click="savesetting('themecolor2','gray-500')""></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-700 to-blue-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="cyan" wire:click="savesetting('themecolor2','cyan-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-green-500 to-green-200 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="emerald" wire:click="savesetting('themecolor2','emerald-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-orange-500 to-yellow-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="orange" wire:click="savesetting('themecolor2','orange-500')"></span>
                    <span class="py-2.2-em text-xs px-3.6-em rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-red-600 to-orange-600 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color="red" wire:click="savesetting('themecolor2','red-500')"></span>
                </div>
            </a>

            <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
            <div class="flex mt-2 mb-12">
                <h6 class="mb-0 dark:text-white">Dark Mode</h6>
                <div class="block pl-0 ml-auto min-h-6">
                    @if ($user->setting('theme')=="dark")
                        <input wire:click="savesetting('theme','light')" checked dark-toggle class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox">
                    @else
                        <input wire:click="savesetting('theme','dark')" dark-toggle class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox">
                    @endif
                </div>
            </div>



            <!--
            <div class="w-full text-center">
                <span></span>
                <h6 class="mt-4 dark:text-white">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%202%20Pro%20Tailwind%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23tailwindCSS&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard-pro-tailwind" class="inline-block px-5 py-2.5 mb-0 mr-2 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer hover:shadow-xs hover:-translate-y-px active:opacity-85 leading-normal tracking-tight-rem bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700" target="_blank"> <i class="mr-1 fab fa-twitter" aria-hidden="true"></i> Tweet </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard-pro-tailwind" class="inline-block px-5 py-2.5 mb-0 mr-2 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer hover:shadow-xs hover:-translate-y-px active:opacity-85 leading-normal tracking-tight-rem bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700" target="_blank"> <i class="mr-1 fab fa-facebook-square" aria-hidden="true"></i> Share </a>
            </div>
            -->

        </div>
    </div>
</div>
