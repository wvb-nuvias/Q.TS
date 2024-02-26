<div>
    @if ($integration->getsetting('active')=="true")
        @php
        $opacity="50";
        @endphp
    @else
        @php
        $opacity="10";
        @endphp
    @endif

    <div class=" flex flex-row p-3 border rounded-md h-60 bg-{{ $integration->integration_color }}-600 bg-opacity-{{$opacity}} opacity-80 hover:opacity-100" title="{{ $integration->integration_name }}">
    @if (str_contains($integration->integration_icon,"brand:"))
        <div class="p-2"><x-theme.headericon extracss="pt-2" icon="" url="{{ $integration->getbrand()->brand_icon }}" title="{{ $integration->integration_name }}" subtitle="{{ $integration->integration_description }}" color="{{ $integration->integration_color }}" /></div>
        <div></div>
    @else
        <div class="p-2"><x-theme.headericon textsize="" textsizetitle="" extracss="pt-2" icon="{{ $integration->integration_icon }}" title="{{ $integration->integration_name }}" subtitle="{{ $integration->integration_description }}" color="{{ $integration->integration_color }}" /></div>
        <div></div>
    @endif
    </div>
</div>
