<div>
    <div class="pt-3 pl-6">
        <x-panel.subtitle>
            Types
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($contacttypes)/2,0,0)*36}}px">
        @foreach ($contacttypes as $contact_type)
            @if ($selected)
                @if (in_array($contact_type->id,$selected))
                <div wire:click="toggle({{$contact_type->id}})" title="{{$contact_type->contact_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$contact_type->contact_type_color}}-600 text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$contact_type->contact_type_icon}}" title="Type : {{$contact_type->contact_type_name}}"></i>
                </div>
                @else
                <div wire:click="toggle({{$contact_type->id}})" title="{{$contact_type->contact_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$contact_type->contact_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$contact_type->contact_type_icon}}" title="Type : {{$contact_type->contact_type_name}}"></i>
                </div>
                @endif
            @else
                <div wire:click="toggle({{$contact_type->id}})" title="{{$contact_type->contact_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$contact_type->contact_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$contact_type->contact_type_icon}}" title="Type : {{$contact_type->contact_type_name}}"></i>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
