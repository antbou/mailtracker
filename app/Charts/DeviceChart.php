<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Tracker;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DeviceChart extends BaseChart
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
                if($agent->device()){
                    $agentDevices[] =$agent->device();
                }
            }
        }
        $devices = [];
        foreach ($agentDevices as $device){
            if(!array_key_exists($device, $devices)){
                $devices[$device] = 1;
            }else{
                $devices[$device] ++;
            }
        }

        return Chartisan::build()
            ->labels(array_keys($devices))
            ->dataset('Devices',array_values($devices) );
    }
}
