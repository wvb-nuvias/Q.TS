@if (data_get($setUp, 'header.searchInput'))
    <div class="flex flex-row mt-2 md:mt-0 w-full rounded-full justify-start sm:justify-center md:justify-end">
        <div class="group relative rounded-full w-9/12 float-end float-right h-10 text-sm block mt-1 placeholder-gray-500 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm">
            <span class="absolute inset-y-0 left-0 flex items-center pl-1">
                <span class="p-1 focus:outline-none focus:shadow-outline">
                    <x-livewire-powergrid::icons.search
                        class="{{ data_get($theme, 'searchBox.iconSearchClass') }}"
                        style="{{ data_get($theme, 'searchBox.iconSearchStyle') }}"
                    />
                </span>
            </span>
            <input
                wire:model.live.debounce.700ms="search"
                type="text"
                class="{{ data_get($theme, 'searchBox.inputClass') }}"
                style="{{ data_get($theme, 'searchBox.inputClass') }}"
                placeholder="{{ trans('livewire-powergrid::datatable.placeholders.search') }}"
            >
            @if ($search)
                <span
                    class="absolute opacity-0 group-hover:opacity-100 transition-all inset-y-0 right-0 flex items-center"
                >
                    <span class="p-2 rounded-full focus:outline-none focus:shadow-outline cursor-pointer">
                        <a wire:click.prevent="$set('search','')">
                            <x-livewire-powergrid::icons.x
                                class="w-4 h-4 {{ data_get($theme, 'searchBox.iconCloseClass') }}"
                                style="{{ data_get($theme, 'searchBox.iconCloseStyle') }}"
                            />
                        </a>
                    </span>
                </span>
            @endif
        </div>
    </div>
@endif
