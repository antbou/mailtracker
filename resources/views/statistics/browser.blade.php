@extends('statistics.index')
@section('chart')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <!-- Chart's container -->
            <div id="chart" style="height: 300px;"></div> <!-- Charting library -->
            <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
            <!-- Chartisan -->
            <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
            <script>
                const chart = new Chartisan({
                    el: '#chart',
                    url: "@chart('browser_chart')"
                    @if ($tracker) {!! ' + ' . "'?tracker=$tracker->id'" !!} @endif,
                    hooks: new ChartisanHooks()
                        .colors()
                        .beginAtZero()
                        .title({!! $tracker ? "'Statisique des Navigateurs pour <$tracker->title>'" : "'Navigateurs'" !!})
                });
            </script>
        </div>
    </div>

@endsection
