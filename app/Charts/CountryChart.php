<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Tracker;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class CountryChart extends BaseChart
{
    use Chart;
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $trackers = $this->trackers($request);

        if ($request->tracker) {
            $trackers = [Tracker::where('_id', $request->tracker)->where('user_id', auth()->user()->_id)->firstOrFail()];
        } else {
            $trackers = Tracker::all()->where('user_id', auth()->user()->_id);
        }

        $countries = [];

        foreach ($trackers as $tracker => $key) {
            foreach ($key->targets as $target) {
                if (\Location::get($target->ip)) {
                    $countries[] = \Location::get($target->ip)->countryName == null ? 'Country not found' : \Location::get($target->ip)->countryName;
                }
            }
        }
        $pays = [];

        foreach ($countries as $country) {
            if (!array_key_exists($country, $pays)) {
                $pays[$country] = 1;
            } else {
                $pays[$country]++;
            }
        }

        return Chartisan::build()
            ->labels(array_keys($pays))
            ->dataset('Pays', array_values($pays));
    }
}
