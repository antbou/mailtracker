<x-app-layout>
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Tracker</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    @include('partials.tracker._container')

                    <div class="pt-3">
                        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                            <header class="px-5 py-4 border-b border-gray-100 pt-5">
                                <h2 class="font-semibold text-gray-800">Cible</h2>
                            </header>
                            <div class="p-3">

                                @include('partials.target._container', ['targets' => $tracker->targets()->get()])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
