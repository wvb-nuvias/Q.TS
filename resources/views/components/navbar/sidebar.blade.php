<aside mini="false" class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto transition-all duration-200 ease-in-out -translate-x-full bg-white dark:bg-slate-850 border-0 shadow-none xl:ml-6 z-990 max-w-64 rounded-2xl xl:translate-x-0 ps" id="sidenav-main">

    <div class="h-20">

    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fa fa-times text-slate-400 dark:text-white xl:hidden" aria-hidden="true" sidenav-close-btn=""></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 dark:text-white" href=" https://demos.creative-tim.com/argon-dashboard-pro-tailwind/pages/dashboards/default.html " target="_blank">
        <img src="img/icon/favicon-32.png" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-in-out">{{ config('app.name') }}</span>
    </a>
    </div>

    <ul class="navbar-nav">
        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">

        <li class="w-full mt-4">
            <h6 class="pl-4 ml-2 text-sm font-bold leading-tight uppercase opacity-60 dark:text-white mb-3 mt-3">PAGES</h6>
        </li>

        <x-navbar.navitem route="dashboard"             icon="chart-pie"        name="Dashboard" />
        <x-navbar.navitem route="incidents"             icon="ambulance"        name="Incidents" />
        <x-navbar.navitem route="subscriptions"         icon="file-contract"    name="Subscriptions" />
        <x-navbar.navitem route="devices"               icon="server"           name="Devices" />

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">

        <li class="w-full mt-4">
            <h6 class="pl-4 ml-2 text-sm font-bold leading-tight uppercase opacity-60 dark:text-white mb-3 mt-3">Administration</h6>
        </li>

        <x-navbar.navitem route="user-profile"          icon="user"             name="Pofile" />
        <x-navbar.navitem route="user-management"       icon="list"             name="User Management" />

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">

        <li class="w-full mt-4">
            <h6 class="pl-4 ml-2 text-sm font-bold leading-tight uppercase opacity-60 dark:text-white mb-3 mt-3">TENANT Administration</h6>
        </li>

        <x-navbar.navitem route="tenant-management"     icon="building-user"    name="Tenant Management" />
        <x-navbar.navitem route="role-management"       icon="user-tag"         name="Role Management" />
        <x-navbar.navitem route="product-management"    icon="cash-register"    name="Product Management" />
    </ul>

</aside>
