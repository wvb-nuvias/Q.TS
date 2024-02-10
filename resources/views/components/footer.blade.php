@php
    $year= date("Y");
@endphp

<footer>
    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                © {{ $year }},
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.qcontinuum.be" class="font-semibold text-slate-700 dark:text-white" target="_blank">the Q Continuum</a>
                for a better web.
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                    <li class="nav-item">
                        <a href="https://www.qcontinuum.be" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">the Q Continuum</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.qcontinuum.be/about-us" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
