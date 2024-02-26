<div>
    <div class="w-full px-6 mx-auto space-y-6">
        <div class="flex flex-wrap -mx-3">
            <livewire:components.summary-incidents-by-type :status="1" :start="'2024-02-01'" :end="'2024-02-28'" updown="+10" :updownwhy="'since last month'" />
            <livewire:components.summary-incidents-by-type :status="6" :start="'2024-02-01'" :end="'2024-02-28'" updown="-5"  :updownwhy="'since last month'" />
            <livewire:components.summary-incidents-by-type :status="4" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
            <livewire:components.summary-alerts :updown="-10" :updownwhy="'since last month'" />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:comonents.graph-incidents-year-overview />
            <livewire:components.summary-incidents-per-brand :start="'2024-02-01'" :end="'2024-02-28'" />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:components.summary-incidents-last />
            <livewire:components.summary-subscriptions-last />
        </div>
        <div class="flex flex-wrap mt-6 -mx-3">

        </div>
        <div class="flex flex-wrap mt-6 -mx-3">

        </div>
    </div>
</div>
