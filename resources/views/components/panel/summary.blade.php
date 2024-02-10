@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif

<x-panel.subtitle extracss="{{$extracss}}">
    @if ($updown>0)
        <i class="fa fa-arrow-up text-emerald-500" aria-hidden="true"></i>
        <span class="font-semibold text-emerald-500">{{ $updown }}%</span> {{ $updownwhy }}
    @else
        <i class="fa fa-arrow-down text-red-500" aria-hidden="true"></i>
        <span class="font-semibold text-red-500">{{ $updown }}%</span> {{ $updownwhy }}
    @endif
</x-panel.subtitle>
