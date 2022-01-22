<?php

namespace App\Charts;

use App\Models\Tracker;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

trait Chart
{
    public function trackers(Request $request): Collection
    {
        if ($request->tracker) {
            return [Tracker::where('_id', $request->tracker)->where('user_id', auth()->user()->_id)->firstOrFail()];
        } else {
            return Tracker::all()->where('user_id', auth()->user()->_id);
        }
    }
}
