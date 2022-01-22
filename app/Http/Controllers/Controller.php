<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getTrackerByRequestIfExistsAndAuthorize(Request $request): ?Tracker
    {
        $tracker = null;
        if ($request->tracker) {
            $tracker = Tracker::findOrFail($request->tracker);
            $this->authorize('view', $tracker);
        }
        return $tracker;
    }
}
