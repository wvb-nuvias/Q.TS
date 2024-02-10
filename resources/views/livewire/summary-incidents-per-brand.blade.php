<x-panel title="Incidents per brand">
    <x-panel.subtitle extracss="-mt-4">
        this month
    </x-panel.subtitle>
    <div class="p-0 overflow-x-auto ps pb-2 pt-4">
        <table class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
            <thead class="align-bottom">
                <tr>
                    <th class="font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Brand</th>
                    <th class="font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nr</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Percentage</th>
                </tr>
            </thead>
            <tbody class="border-t">
            @foreach ($results as $result)
            <tr>
                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2">
                        <div>
                            <img src="img/icon/vendor/{{ $result["icon"] }}" class="inline-flex items-center justify-center mr-2 text-sm text-white transition-all duration-200 ease-in-out h-6 w-6" alt="spotify">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-xs leading-normal dark:text-white dark:opacity-60">{{ $result["name"] }}</h6>
                        </div>
                    </div>
                </td>
                <td class="align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2">
                        <div class="my-auto">
                            <h6 class="mb-0 text-xs leading-normal dark:text-white dark:opacity-60">{{ $result["tot"] }}</h6>
                        </div>
                    </div>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex items-center">
                        <span class="w-20 mr-2 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ number_format($result["percentage"], 2, '.', ','); }}%</span>
                        <div>
                            <div class="text-xs h-2 m-0 flex overflow-visible rounded-lg bg-gray-200 dark:opacity-80" style="width: 250px">
                                <div class="flex flex-col justify-center w-20 h-auto overflow-hidden text-center text-white transition-all rounded duration-600 ease bg-gradient-to-tl from-{{ $result["color1"] }} to-{{ $result["color2"] }} whitespace-nowrap" role="progressbar" aria-valuenow="{{ $result["percentage"] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $result["percentage"]*2.5 }}px"></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-panel>
