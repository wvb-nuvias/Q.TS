@if (!isset($size))
    @php
    $size="big";
    @endphp
@endif

<a href="/">
    @if ($size=="big")
        <div class="flex mb-3">
            <div class="">
                <img src="img/icon/favicon-192.png" />
            </div>
            <div class="flex flex-col">
                <div class="dark:text-white text-9xl">
                    .TS
                </div>
                <div class="opacity-80 dark:text-white text-2xl p-2">
                    {{ config('app.subtitle', 'Laravel') }}
                </div>
            </div>
        </div>
    @elseif ($size=="medium")
        <div class="flex mb-3">
            <div class="">
                <img src="/img/icon/favicon-62.png" />
            </div>
            <div class="flex flex-col">
                <div class="dark:text-white text-4xl">
                    .TS
                </div>
                <div class="opacity-80 dark:text-white text-sm pl-1">
                    {{ config('app.subtitle', 'Laravel') }}
                </div>
            </div>
        </div>
    @elseif ($size=="small")
        <div class="w-full flex justify-center mt-3">
            <div class="flex">
                <div class="">
                    <img src="/img/icon/favicon-48.png" />
                </div>
                <div class="flex flex-col">
                    <div class="dark:text-white text-2xl">
                        .TS
                    </div>
                    <div class="opacity-80 dark:text-white text-xs pl-1">
                        {{ config('app.subtitle', 'Laravel') }}
                    </div>
                </div>
            </div>
        </div>
    @elseif ($size=="mark")
        <div class="w-full flex justify-center mt-3">
            <div class="">
                <img src="/img/icon/favicon-48.png" />
            </div>
        </div>
    @endif
</a>

