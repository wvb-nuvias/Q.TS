@if (!isset($wire))
    @php
    $wire="";
    @endphp
@endif

<div wire:click="{{$wire}}" style="position:absolute; right:25px; top:20px">
    <i class="fa fa-cog fa-xl opacity-30 hover:opacity-50 cursor-pointer"></i>
</div>
