<div class="relative flex flex-col flex-auto min-w-0 px-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-6" id="profile">
    @if ($title)
    <div class="p-2 mb-0 rounded-t-2xl py-4">
        <h5 class="dark:text-white">{{$title}}</h5>
    </div>
    @endif
    <div class="pl-2 pr-2 mb-4 rounded-t-2xl">
        {{$slot}}
    </div>
</div>
