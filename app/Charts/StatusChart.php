<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Tracker;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class StatusChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $trackers = Tracker::all()->where('user_id',auth()->user()->_id);
        foreach ($trackers as $tracker){
            $listStates[] =$tracker->state->name;
        }

        $states = [];
        foreach ($listStates as $state){
            if(!array_key_exists($state, $states)){
                $states[$state] = 1;
            }else{
                $states[$state] ++;
            }
        }

        return Chartisan::build()
            ->labels(array_keys($states))
            ->dataset('Devices',array_values($states) );
    }
}
