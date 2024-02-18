<div>
    <div class="pt-3 pl-6">
        <x-panel.subtitle>
            Statuses
        </x-panel.subtitle>
        <div class="flex flex-wrap" style="width: {{round(count($statuses)/2,0,0)*36}}px">
        @foreach ($statuses as $status)
            @if (in_array($status->id,$selected))
            <div wire:click="toggle({{$status->id}})" title="{{$status->name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$status->color}}-600 text-white opacity-80 hover:opacity-100 size-7 items-center justify-center">
                <i class="fa fa-{{$status->icon}}"></i>
            </div>
            @else
            <div wire:click="toggle({{$status->id}})" title="{{$status->name}}" class="mr-2 mb-2 cursor-pointer flex border rounded-sm bg-{{$status->color}}-600 text-white opacity-30 hover:opacity-100 size-7 items-center justify-center">
                <i class="fa fa-{{$status->icon}}"></i>
            </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
