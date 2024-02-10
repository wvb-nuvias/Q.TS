@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif

<p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-40 {{$extracss}}">
    {{ $slot }}
</p>
