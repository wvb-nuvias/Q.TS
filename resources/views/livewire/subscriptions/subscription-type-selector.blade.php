<div>
    <div class="pt-3 pl-6">
        <x-panel.subtitle>
            Types
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($types)/2,0,0)*36}}px">
        @foreach ($types as $subscription_type)
            @if ($selected)
                @if (in_array($subscription_type->id,$selected))
                <div wire:click="toggle({{$subscription_type->id}})" title="{{$subscription_type->subscription_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$subscription_type->subscription_type_color}}-600 text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$subscription_type->subscription_type_icon}}" title="Type : {{$subscription_type->subscription_type_name}}"></i>
                </div>
                @else
                <div wire:click="toggle({{$subscription_type->id}})" title="{{$subscription_type->subscription_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$subscription_type->subscription_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$subscription_type->subscription_type_icon}}" title="Type : {{$subscription_type->subscription_type_name}}"></i>
                </div>
                @endif
            @else
                <div wire:click="toggle({{$subscription_type->id}})" title="{{$subscription_type->subscription_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$subscription_type->subscription_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$subscription_type->subscription_type_icon}}" title="Type : {{$subscription_type->subscription_type_name}}"></i>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
