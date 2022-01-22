<x-app-layout>
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Statisiques @isset($tracker)
                        pour <a class="text-blue-400 hover:text-blue-600 underline"
                            href="{{ route('tracker.show', ['tracker' => $tracker]) }}">{{ $tracker->title }}</a>
                    @endisset</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <div class="flex justify-center">
                        <div class="w-8/12 bg-white p-6 rounded-lg">
                            <div class="font-bold text-xl p-6 bg-white md:flex justify-between mb-6 md:p-8">
                                <x-stats.nav-link :href="route('statistics.country', ['tracker' => $tracker])"
                                    :active="request()->routeIs('statistics.country')">
                                    {{ __('Pays') }}
                                </x-stats.nav-link>
                                @if (!isset($tracker))
                                    <x-stats.nav-link :href="route('statistics.status')"
                                        :active="request()->routeIs('statistics.status')">
                                        {{ __('Status') }}
                                    </x-stats.nav-link>
                                @endif

                                <x-stats.nav-link :href="route('statistics.device', ['tracker' => $tracker])"
                                    :active="request()->routeIs('statistics.device')">
                                    {{ __('Appareils') }}
                                </x-stats.nav-link>
                                <x-stats.nav-link :href="route('statistics.browser', ['tracker' => $tracker])"
                                    :active="request()->routeIs('statistics.browser')">
                                    {{ __('Navigateurs') }}
                                </x-stats.nav-link>
                                <x-stats.nav-link :href="route('statistics.platform', ['tracker' => $tracker])"
                                    :active="request()->routeIs('statistics.platform')">
                                    {{ __('Plateformes') }}
                                </x-stats.nav-link>
                            </div>
                            @yield('chart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
