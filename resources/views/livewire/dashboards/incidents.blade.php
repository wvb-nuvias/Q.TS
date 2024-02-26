<div>
    <div class="w-full px-6 mx-auto space-y-6">
        <div class="flex flex-wrap -mx-3">
            <livewire:components.summary-incidents-by-type :status="1" :start="'2024-02-01'" :end="'2024-02-28'" updown="+10" :updownwhy="'since last month'" />
            <livewire:components.summary-incidents-by-type :status="6" :start="'2024-02-01'" :end="'2024-02-28'" updown="-5"  :updownwhy="'since last month'" />
            <livewire:components.summary-incidents-by-type :status="4" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
            <livewire:components.summary-incidents-by-type :status="5" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:components.graph-incidents-year-overview />
            <livewire:components.summary-incidents-per-brand :start="'2024-02-01'" :end="'2024-02-28'" />
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:components.summary-incidents-last />
        </div>
        <div class="flex w-full space-x-6">
            @if ($user->hasright('VIEW_LOG'))
            <livewire:logs.log-panel source="Incidents" />
            @endif
        </div>
    </div>
</div>
