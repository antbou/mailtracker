<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Tracker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrackerRequest;
use App\Http\Requests\UpdateTrackerRequest;
use App\Models\Target;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tracker.index', ['trackers' => auth()->user()->trackers()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrackerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackerRequest $request)
    {
        $tracker = Tracker::create([
            'title' => $request->object,
            'email' => $request->get('email-address'),
            'user_id' => Auth::user()->id,
            'state_id' => State::findBySlug('OPN')->id
        ]);

        return redirect()->route('tracker.show', ['tracker' => $tracker]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function show(Tracker $tracker)
    {
        return view('tracker.show', ['tracker' => $tracker]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracker $tracker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackerRequest  $request
     * @param  \App\Models\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackerRequest $request, Tracker $tracker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracker $tracker)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracker  $tracker
     * @return \Illuminate\Http\Response
     */
    public function tracking(Request $request, Tracker $tracker)
    {
        Target::create([
            'ip' => $request->ip(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
            'tracker_id' => $tracker->id,
        ]);
        return Storage::response('1x1.png', null, ['Content-Type' => 'image/png']);
    }
}
