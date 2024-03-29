@if (!isset($title))
    @php
    $title="";
    @endphp
@endif
@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif


<div class="min-h-32 relative flex flex-col flex-auto min-w-0 px-4 break-words bg-gray-200 border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border {{$extracss}}" id="profile">
    @if ($title)
    <div class="p-2 mb-0 rounded-t-2xl py-4">
        <x-panel.title title="{{ $title }}" />
    </div>
    @endif
    <div class="pl-2 pr-2 mb-4 rounded-t-2xl">
        {{$slot}}
    </div>
</div>
