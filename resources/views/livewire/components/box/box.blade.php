<div>
    <x-label for="Sources" value="{{ __(' Sources') }}" />
    <div id="Sources" class="overflow-auto h-60 border rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm block w-full mt-1">
        @foreach ($items as $item)
            @livewire('components.box.box-item', ['item' => $item])
        @endforeach
    </div>
</div>
