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
        $open=0;
        $wating=0;
        foreach ($trackers as $tracker){
            if($tracker->state->slug === 'OPN'){
                $open++;
            }else{
                $wating++;
            }
        }
        return Chartisan::build()
            ->labels(['Open', 'Waiting'])
            ->dataset('states', [$open, $wating]);
    }
}
