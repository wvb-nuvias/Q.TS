@if (!isset($icon))
    @php
    $icon="";
    @endphp
@endif

@if (!isset($color))
    @php
    $color="slate";
    @endphp
@endif

@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif

<div class="flex flex-wrap -mx-3 pt-6">
    <div class="w-4/12 max-w-full px-3 flex-0 sm:w-auto">
        <div class="relative inline-flex items-center justify-center text-base text-white transition-all duration-200 ease-in-out w-19 h-19 rounded-xl">
            @if ($icon=="")
                <img class="w-full shadow-sm rounded-xl" src="{{$url}}" alt="{{ $title }}" style="height:76px;width:76px">
            @else
                <x-theme.icon icon="{{$icon}}" color="{{$color}}" />
            @endif
        </div>
    </div>
    <div class="w-8/12 max-w-full px-3 my-auto flex-0 sm:w-auto {{$extracss}}">
        <div class="h-full">
            <h5 class="mb-1 font-bold dark:text-white">{{ $title }}</h5>
            <p class="mb-0 text-sm font-semibold leading-normal">{{ $subtitle }}</p>
        </div>
    </div>
</div>
