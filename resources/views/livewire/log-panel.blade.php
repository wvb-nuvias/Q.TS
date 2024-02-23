<div>
<x-panel title="Logs" extracss="opacity-20 hover:opacity-100">
    <x-panel.subtitle extracss="-mt-4">
        {{ $subtitle }}
    </x-panel.subtitle>
    <div style="position:absolute; right:25px; top:20px">
        @livewire('log-type-selector', ["selectedtypes" => $selectedtypes])
    </div>
    <div class="pt-6">
        @livewire('logs-table', ["user" => $user, "source" => $source, "selectedtypes" => $selectedtypes])
    </div>
</x-panel>
</div>
