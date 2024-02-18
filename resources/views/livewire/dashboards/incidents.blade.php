<div>
    <div class="w-full px-6 mx-auto space-y-6">
        <div class="flex flex-wrap -mx-3">
            <livewire:summary-incidents-by-type :status="1" :start="'2024-02-01'" :end="'2024-02-28'" updown="+10" :updownwhy="'since last month'" />
            <livewire:summary-incidents-by-type :status="6" :start="'2024-02-01'" :end="'2024-02-28'" updown="-5"  :updownwhy="'since last month'" />
            <livewire:summary-incidents-by-type :status="4" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
            <livewire:summary-incidents-by-type :status="5" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:graph-incidents-year-overview />
            <livewire:summary-incidents-per-brand :start="'2024-02-01'" :end="'2024-02-28'" />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:summary-incidents-last />
        </div>
        <div class="flex flex-wrap ">
            <livewire:log-panel source="Incidents" />
        </div>
        <div class="flex flex-wrap ">

        </div>
    </div>
</div>
