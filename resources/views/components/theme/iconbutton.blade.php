<div wire:click="{{$wire}}" title="{{$title}}" class="opacity-80 hover:opacity-100 cursor-pointer pt-6 pl-3">
    <x-theme.icon icon="{{$icon}}" color="{{$color}}" />
    <div class="p-2 bg-red-600 border rounded-md h-8 w-8 flex items-center justify-center" style="position: absolute; right: 15px; bottom:20px;">
        <i class="fa fa-plus"></i>
    </div>
</div>
