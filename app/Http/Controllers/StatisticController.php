<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {

        return view('statistics.index', ['tracker' => $this->getTrackerByRequestIfExistsAndAuthorize($request)]);
    }

    public function status(Request $request)
    {
        return view('statistics.status', ['tracker' => $this->getTrackerByRequestIfExistsAndAuthorize($request)]);
    }

    public function browser(Request $request)
    {
        return view('statistics.browser', ['tracker' => $this->getTrackerByRequestIfExistsAndAuthorize($request)]);
    }

    public function device(Request $request)
    {
        return view('statistics.device', ['tracker' => $this->getTrackerByRequestIfExistsAndAuthorize($request)]);
    }

    public function platform(Request $request)
    {
        return view('statistics.platform', ['tracker' => $this->getTrackerByRequestIfExistsAndAuthorize($request)]);
    }

    public function country(Request $request)
    {
        return view('statistics.country', ['tracker' => $this->getTrackerByRequestIfExistsAndAuthorize($request)]);
    }
}
