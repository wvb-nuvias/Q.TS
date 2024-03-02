@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif

@if (!isset($mode))
    @php
    $mode="add";
    $modecolor='red';
    $modeicon='plus';
    @endphp
@else
    @php
        switch ($mode)
        {
            case "add":
                $modecolor='blue';
                $modeicon='plus';
                break;
            case "edit":
                $modecolor='amber';
                $modeicon='pen';
                break;
            case "view":
                $modecolor='green';
                $modeicon='eye';
                break;
            case "settings":
                $modecolor='purple';
                $modeicon='cog';
                break;
        }
    @endphp
@endif

<div wire:click="{{$wire}}" title="{{$title}}" class="opacity-80 hover:opacity-100 cursor-pointer pt-6 pl-3">
    <x-theme.icon icon="{{$icon}}" color="{{$color}}" />
    <div class="p-2 bg-{{$modecolor}}-600 border rounded-md h-8 w-8 flex items-center justify-center" style="position: absolute; right: 15px; bottom:20px;">
        <i class="fa fa-{{$modeicon}}"></i>
    </div>
</div>
