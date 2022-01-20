<x-app-layout>
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Statistics</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <div class="flex justify-center">
                        <div class="w-8/12 bg-white p-6 rounded-lg">
                            <div>
                                <ul class="font-bold text-3xl p-6 bg-white flex justify-between mb-6 md:p-8 ">
                                    <li><a href="{{ route('statistics.country') }}">country</a></li>
                                    <li><a href="{{ route('statistics.status') }}">status</a></li>
                                    <li><a href="{{ route('statistics.device') }}">device</a></li>
                                    <li><a href="{{ route('statistics.browser') }}">browser</a></li>
                                    <li><a href="{{ route('statistics.platform') }}">platform</a></li>
                                </ul>
                            </div>
                            @yield('chart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
