<?php

namespace App\Charts;

use App\Models\Tracker;
use Illuminate\Http\Request;

trait Chart
{
    public function trackers(Request $request)
    {
        if ($request->tracker) {
            return [Tracker::where('_id', $request->tracker)->where('user_id', auth()->user()->_id)->firstOrFail()];
        } else {
            return Tracker::all()->where('user_id', auth()->user()->_id);
        }
    }
}
