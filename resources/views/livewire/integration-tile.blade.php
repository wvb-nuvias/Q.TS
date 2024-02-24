<div>
    @if ($integration->getsetting('active')=="true")
        @php
        $opacity="50";
        @endphp
    @else
        @php
        $opacity="20";
        @endphp
    @endif

    <div class="flex flex-row p-3 border rounded-md h-60 bg-{{ $integration->integration_color }}-600 bg-opacity-{{$opacity}} opacity-80 hover:opacity-100" title="{{ $integration->integration_name }}">
        <div class="p-2"><x-theme.headericon extracss="pt-2" icon="{{ $integration->integration_icon }}" title="{{ $integration->integration_name }}" subtitle="{{ $integration->integration_description }}" color="{{ $integration->integration_color }}" /></div>
        <div></div>
    </div>
</div>
