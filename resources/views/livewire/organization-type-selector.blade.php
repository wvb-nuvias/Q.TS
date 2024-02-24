<div>
    <div class="pt-3 pl-6">
        <x-panel.subtitle>
            Types
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($types)/2,0,0)*36}}px">
        @foreach ($types as $organization_type)
            @if ($selected)
                @if (in_array($organization_type->id,$selected))
                <div wire:click="toggle({{$organization_type->id}})" title="{{$organization_type->organization_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$organization_type->organization_type_color}}-600 text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$organization_type->organization_type_icon}}" title="Type : {{$organization_type->organization_type_name}}"></i>
                </div>
                @else
                <div wire:click="toggle({{$organization_type->id}})" title="{{$organization_type->organization_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$organization_type->organization_type__color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$organization_type->organization_type_icon}}" title="Type : {{$organization_type->organization_type_name}}"></i>
                </div>
                @endif
            @else
                <div wire:click="toggle({{$organization_type->id}})" title="{{$organization_type->organization_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$organization_type->organization_type__color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$organization_type->organization_type_icon}}" title="Type : {{$organization_type->organization_type_name}}"></i>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
