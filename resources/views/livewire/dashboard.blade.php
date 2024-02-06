<div>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <x-summarybox icon="file-circle-question"    color1="blue-500"    color2="violet-500" title="open incidents"    total="10"  previous="" />
            <x-summarybox icon="file-circle-xmark"       color1="orange-500"  color2="yellow-500" title="closed incidents"  total="20"  previous="" />
            <x-summarybox icon="file-circle-exclamation" color1="emerald-500" color2="teal-400"   title="waiting incidents" total="100" previous="" />
            <x-summarybox icon="bell"                    color1="red-600"     color2="orange-600" title="alerts"            total="5"   previous="" />
        </div>
        <div class="flex flex-wrap mt-6 space-x-6">
            <livewire:graph-incidents-year-overview />
            <livewire:summary-incidents-per-brand />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:summary-incidents-last />
            <livewire:summary-subscriptions-last />
        </div>
        <div class="flex flex-wrap mt-6 -mx-3">

        </div>
        <div class="flex flex-wrap mt-6 -mx-3">

        </div>
    </div>
</div>
