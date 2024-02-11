<div class="h-40 rounded-xl" style="background-size: cover; background-image: url('{{ $url }}');">
    <div class="opacity-50 h-40 w-full bg-gradient-to-tl from-{{$themecolor1}} to-{{$themecolor2}} rounded-xl"></div>
</div>
<div class="-mt-9 w-11/12 mx-auto">
    <x-panel title="">
        {{ $slot }}
    </x-panel>
</div>
