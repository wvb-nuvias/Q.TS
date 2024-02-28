<div>
    <div class="h-10 flex flex-row opacity-50 hover:opacity-100 w-full bg-{{$item["color"]}}-600 bg-opacity-50 cursor-pointer">
        <div class="flex h-10 justify-center w-10 mt-2 pr-2 pl-2">
            <x-theme.icon extracss="p-2" textheight="text-md" height="25" width="25" color="{{$item['color']}}" icon="{{$item['icon']}}" />
        </div>
        <div class="">
            <div class="text-sm">{{$item["name"]}}</div>
            <div class="text-xs -mt-1">{{substr($item["description"],0,35)}}</div>
        </div>
    </div>
</div>
