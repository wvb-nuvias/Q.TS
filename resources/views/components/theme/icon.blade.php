@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif

@if (!isset($width))
    @php
    $width="76";
    @endphp
@endif

@if (!isset($height))
    @php
    $height="76";
    @endphp
@endif

@if (!isset($textheight))
    @php
    $textheight="text-4xl";
    @endphp
@endif

<div class="{{$extracss}} border shadow-sm rounded-xl flex items-center justify-center bg-gradient-to-tl from-{{$color}}-800 to-{{$color}}-600" style="height:{{$height}}px;width:{{$width}}px">
    <i class="fa fa-{{$icon}} dark:text-white {{$textheight}}"></i>
</div>
