<x-panel title="Last Years Incidents">
    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid pb-0">
        <x-panel.summary updown="+4" updownwhy="more in 2021" extracss="-mt-4" />
    </div>
    <x-theme.settings />
    <div class="flex-auto p-4">
        <div>
            <canvas id="chart-line" height="300" width="627" style="display: block; box-sizing: border-box; height: 300px; width: 627.1px;"></canvas>
        </div>
    </div>
</x-panel>
