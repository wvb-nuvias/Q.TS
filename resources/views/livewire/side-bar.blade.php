<div>
    <aside mini="false" id="sidebar" class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto transition-all duration-200 ease-in-out -translate-x-full bg-gray-200 dark:bg-slate-850 border-0 shadow-none xl:ml-6 z-990 max-w-64 rounded-2xl xl:translate-x-0 ps" id="sidenav-main">

        <div class="h-20">

        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fa fa-times text-slate-400 dark:text-white xl:hidden" aria-hidden="true" sidenav-close-btn=""></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 dark:text-white" href=" https://demos.creative-tim.com/argon-dashboard-pro-tailwind/pages/dashboards/default.html " target="_blank">
            <img src="img/icon/favicon-32.png" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-in-out">{{ config('app.name') }}</span>
        </a>
        </div>

        <ul class="navbar-nav">
            <x-navbar.sep />

            <x-navbar.title title="Pages" />

            <x-navbar.item route="dashboard"             icon="chart-pie"        name="Dashboard" />

            @if (in_array("VIEW_INC", $rights))
            <x-navbar.item route="incidents"             icon="ambulance"        name="Incidents" />
            @endif

            @if (in_array("VIEW_SUB", $rights))
            <x-navbar.item route="subscriptions"         icon="file-contract"    name="Subscriptions" />
            @endif

            @if (in_array("VIEW_DEVICE", $rights))
            <x-navbar.item route="devices"               icon="server"           name="Devices" />
            @endif

            @if (in_array("VIEW_ALERT", $rights))
            <x-navbar.item route="alerts"                icon="bell"             name="Alerts" />
            @endif

            <x-navbar.sep />

            <x-navbar.title title="Administration" />

            @if (in_array("VIEW_PROFILE", $rights))
            <x-navbar.item route="user-profile"          icon="user"             name="Pofile" />
            @endif

            @if (in_array("VIEW_USER", $rights))
            <x-navbar.item route="user-management"       icon="list"             name="User Management" />
            @endif

            @if (in_array("VIEW_ROLES", $rights))
            <x-navbar.item route="role-management"       icon="user-tag"         name="Role Management" />
            @endif

            @if (in_array("VIEW_TYPES", $rights))
            <x-navbar.item route="type-management"       icon="quote-right"      name="Type Management" />
            @endif

            @if (in_array("VIEW_PROD", $rights))
            <x-navbar.item route="product-management"    icon="cash-register"    name="Product Management" />
            @endif

            <x-navbar.sep />

            @if (in_array("VIEW_TENANT", $rights))
            <x-navbar.title title="Tenant Administration" />

            <x-navbar.item route="tenant-management"     icon="building-user"    name="Tenant Management" />
            @endif
        </ul>
    </aside>
</div>
