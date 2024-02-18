<div class="w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <x-panel title="" >
        <div class="flex-auto pt-4 pb-4">
            <div class="flex flex-row">
                <div class="flex-none w-2/3 px-3">
                    <div class="w-full">
                        <x-panel.title title="{{ $title }}" />
                        <h5 class="mb-2 font-bold dark:text-white">{{ $count }}</h5>
                        <x-panel.summary updown="{{ $updown }}" updownwhy="{{ $updownwhy }}" />
                    </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-{{ $color1 }} to-{{ $color2 }}">
                        <i class="fa leading-none fa-{{$icon}} text-lg relative top-3.5 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </x-panel>
</div>
