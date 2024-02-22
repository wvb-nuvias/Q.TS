<div>
    <div class="pt-3 pl-6">
        <x-panel.subtitle>
            Types
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($logtypes)/2,0,0)*36}}px">
        @foreach ($logtypes as $logtype)
            @if ($selectedtypes)
                @if (in_array($logtype->id,$selectedtypes))
                <div wire:click="toggle({{$logtype->id}})" title="{{$logtype->log_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$logtype->log_type_color}}-600 text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$logtype->log_type_icon}}"></i>
                </div>
                @else
                <div wire:click="toggle({{$logtype->id}})" title="{{$logtype->log_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$logtype->log_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$logtype->log_type_icon}}"></i>
                </div>
                @endif
            @else
                <div wire:click="toggle({{$logtype->id}})" title="{{$logtype->log_type_name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$logtype->log_type_color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                    <i class="fa fa-{{$logtype->log_type_icon}}"></i>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
