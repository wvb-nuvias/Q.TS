@if (session()->has('success'))
    <div class="alert bg-green-100 border-t-4 border-green-300 rounded-b text-gray-900 px-4 py-3 shadow-md mb-5">
        <div class="flex items-center">
            <div class="py-1 fill-current h-6 w-6 text-gray-500 mr-4 fa fa-circle-check fa-xl"></div>
            <div>
                <p class="font-bold">Success</p>
                <p class="text-sm">{{ session('success') }} </p>
            </div>
        </div>
    </div>
@endif

@if (session()->has('info'))
    <div class="alert bg-yellow-100 border-t-4 border-yellow-300 rounded-b text-gray-900 px-4 py-3 shadow-md mb-5">
        <div class="flex items-center">
            <div class="py-1 fill-current h-6 w-6 text-gray-500 mr-4 fa fa-circle-info fa-xl"></div>
            <div>
                <p class="font-bold">Info</p>
                <p class="text-sm">{{ session('info') }} </p>
            </div>
        </div>
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert bg-orange-100 border-t-4 border-orange-300 rounded-b text-gray-900 px-4 py-3 shadow-md mb-5">
        <div class="flex items-center">
            <div class="py-1 fill-current h-6 w-6 text-gray-500 mr-4 fa fa-circle-exclamation fa-xl"></div>
            <div>
                <p class="font-bold">Warning</p>
                <p class="text-sm">{{ session('warning') }} </p>
            </div>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert bg-red-100 border-t-4 border-red-300 rounded-b text-gray-900 px-4 py-3 shadow-md mb-5">
        <div class="flex items-center">
        <div class="py-1 fill-current h-6 w-6 text-gray-500 mr-4 fa fa-triangle-exclamation fa-xl"></div>
            <div>
                <p class="font-bold">Error</p>
                <p class="text-sm">{{ session('error') }} </p>
            </div>
        </div>
    </div>
@endif
