<div>
    <div class="pt-3">
        <x-panel.subtitle>
            Brands
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($brands)/2,0,0)*36}}px">
        @foreach ($brands as $brand)
            @if (in_array($brand->id,$selected))
            <div wire:click="toggle({{$brand->id}})" title="{{$brand->brand_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$brand->brand_color1}} text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                <img src="/img/icon/vendor/{{$brand->brand_icon}}" />
            </div>
            @else
            <div wire:click="toggle({{$brand->id}})" title="{{$brand->brand_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$brand->brand_color1}} text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                <img src="/img/icon/vendor/{{$brand->brand_icon}}" />
            </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
