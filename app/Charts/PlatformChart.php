<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Tracker;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class PlatformChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $agent = new Agent();

        $trackers = Tracker::all()->where('user_id', auth()->user()->_id);
        foreach ($trackers as $tracker => $key ){
            foreach ($key->targets as $target){
                $agent->setUserAgent($target->user_agent);
                if($agent->platform()){
                    $agentPlatforms[] =$agent->platform();
                }
            }
        }
        $platforms = [];
        foreach ($agentPlatforms as $platform){
            if(!array_key_exists($platform, $platforms)){
                $platforms[$platform] = 1;
            }else{
                $platforms[$platform] ++;
            }
        }

        return Chartisan::build()
            ->labels(array_keys($platforms))
            ->dataset('Platforms',array_values($platforms) );
    }
}
