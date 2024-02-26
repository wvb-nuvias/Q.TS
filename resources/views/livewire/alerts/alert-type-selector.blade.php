<div>
    <div class="pt-3 pl-6">
        <x-panel.subtitle>
            Types
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($alerttypes)/2,0,0)*36}}px">
        @foreach ($alerttypes as $alert_type)
            @if ($selected)
                @if (in_array($alert_type->id,$selected))
                <div wire:click="toggle({{$alert_type->id}})" title="{{$alert_type->alert_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$alert_type->alert_type_color}}-600 text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$alert_type->alert_type_icon}}" title="Type : {{$alert_type->alert_type_name}}"></i>
                </div>
                @else
                <div wire:click="toggle({{$alert_type->id}})" title="{{$alert_type->alert_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$alert_type->alert_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$alert_type->alert_type_icon}}" title="Type : {{$alert_type->alert_type_name}}"></i>
                </div>
                @endif
            @else
                <div wire:click="toggle({{$alert_type->id}})" title="{{$alert_type->alert_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$alert_type->alert_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$alert_type->alert_type_icon}}" title="Type : {{$alert_type->alert_type_name}}"></i>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
