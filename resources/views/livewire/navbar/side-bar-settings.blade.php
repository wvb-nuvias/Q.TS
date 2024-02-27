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

        <ul class="navbar-nav">
            <x-navbar.sep />

            <x-navbar.title title="Theme Colors" />

            <x-navbar.title title="color 1" />
            <x-navbar.colors setting="themecolor1" />

            <x-navbar.title title="color 2" />
            <x-navbar.colors setting="themecolor2" />

            <x-navbar.sep />

            <x-navbar.title title="Dark Mode" />
            <x-navbar.darkmodeswitch setting="{{ $user->setting('theme') }}" />

            <x-navbar.title title="Sidebar Mode" />

            <x-navbar.sidebarbgcolor />
        </ul>
    </div>

    <script src="/js/plugin.js"></script>
</div>
