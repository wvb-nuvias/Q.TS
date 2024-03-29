<div>
    <div class="w-full px-6 mx-auto space-y-6">
        <div class="w-full -mx-3">
            <div class="flex flex-wrap w-full">
                <livewire:components.summary-subscriptions-by-brand :brand="1" :start="'2024-02-01'" :end="'2024-02-28'" updown="+10" :updownwhy="'since last month'" />
                <livewire:components.summary-subscriptions-by-brand :brand="2" :start="'2024-02-01'" :end="'2024-02-28'" updown="-5"  :updownwhy="'since last month'" />
                <livewire:components.summary-subscriptions-by-brand :brand="3" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
                <livewire:components.summary-subscriptions-by-brand :brand="4" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
            </div>
            <div class="flex flex-wrap w-full pt-6">
                <livewire:components.summary-subscriptions-by-brand :brand="5" :start="'2024-02-01'" :end="'2024-02-28'" updown="+10" :updownwhy="'since last month'" />
                <livewire:components.summary-subscriptions-by-brand :brand="6" :start="'2024-02-01'" :end="'2024-02-28'" updown="-5"  :updownwhy="'since last month'" />
                <livewire:components.summary-subscriptions-by-brand :brand="7" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
                <livewire:components.summary-subscriptions-by-brand :brand="8" :start="'2024-02-01'" :end="'2024-02-28'" updown="+40" :updownwhy="'since last month'" />
            </div>
        </div>
        <div class="flex flex-wrap space-x-6">
            <livewire:components.summary-subscriptions-last />
        </div>
        <div class="flex flex-wrap ">
            <livewire:logs.log-panel source="Subscriptions" />
        </div>
        <div class="flex flex-wrap ">

        </div>
    </div>
</div>
