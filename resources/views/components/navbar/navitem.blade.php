@if (Route::currentRouteName()==$route)
<li class="nav-item">
    <a class="after:ease-in-out after:font-awesome-5-free ease-in-out text-sm leading-default py-2.7 my-0 mx-2 flex items-center whitespace-nowrap rounded-lg bg-blue-500/30 px-4 font-semibold text-slate-700 transition-all after:ml-auto after:inline-block after:rotate-180 after:font-bold dark:after:text-white after:text-slate-800 after:antialiased after:transition-all after:duration-200 dark:text-white dark:opacity-80" href="{{ route($route) }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-{{ $icon }}" style="width:20px"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease dark:text-white text-slate-700">{{ $name }}</span>
    </a>
</li>
@else
<li class="nav-item">
    <a class="ease-in-out text-sm leading-default py-2.7 active after:ease-in-out after:font-awesome-5-free my-0 mx-2 flex items-center whitespace-nowrap px-4 font-medium text-slate-500 shadow-none transition-colors after:ml-auto after:inline-block after:font-bold after:text-slate-800/50 after:antialiased after:transition-all after:duration-200 dark:text-white dark:opacity-80 dark:after:text-white/50 dark:after:text-white" href="{{ route($route) }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-{{ $icon }}" style="width:20px"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease dark:text-white text-slate-700">{{ $name }}</span>
    </a>
</li>
@endif
