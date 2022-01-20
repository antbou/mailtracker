<?php

namespace App\Providers;

use App\Charts\BrowserChart;
use App\Charts\CountryChart;
use App\Charts\DeviceChart;
use App\Charts\PlatformChart;
use App\Charts\StatusChart;
use ConsoleTVs\Charts\Registrar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //register our chart
    public function boot(Registrar $charts)
    {
        $charts->register([
            StatusChart::class,
            BrowserChart::class,
            CountryChart::class,
            DeviceChart::class,
            PlatformChart::class
        ]);
    }
}
