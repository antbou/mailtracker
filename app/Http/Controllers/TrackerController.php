<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Target;
use App\Models\Tracker;
use Illuminate\Support\Facades\Redis;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrackerRequest;
use App\Http\Requests\UpdateTrackerRequest;
use Stevebauman\Location\Location;

class TrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->_id;
        if (!Redis::zcard("user.{$id}")) {
            $trackers = Tracker::all()->where('user_id', auth()->user()->_id);
            foreach ($trackers as $tracker)
                Redis::zadd("user.{$id}", 1, $tracker->_id);
        }

        $recentIds = Redis::zrevrange("user.{$id}", 0, -1);
        $trackers = collect($recentIds)->map(function ($id) {
            return Tracker::find($id);
        });


        return view('tracker.index', compact('trackers'));
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
     * @param \App\Http\Requests\StoreTrackerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackerRequest $request)
    {
        $tracker = Tracker::create([
            'title' => $request->object,
            'email' => $request->get('email-address'),
            'user_id' => Auth::user()->id,
            'state_id' => State::findBySlug('WYT')->id
        ]);

        $id = auth()->user()->_id;
        Redis::zadd("user.{$id}", time(), $tracker->_id);
        return redirect()->route('tracker.show', ['tracker' => $tracker]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tracker $tracker
     * @return \Illuminate\Http\Response
     */
    public function show(Tracker $tracker)
    {
        $this->authorize('view', $tracker);

        $id = auth()->user()->_id;
        Redis::zadd("user.{$id}", time(), $tracker->_id);
        $agent = new Agent();
        return view('tracker.show', ['tracker' => $tracker, 'agent' => $agent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tracker $tracker
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracker $tracker)
    {
        $this->authorize('view', $tracker);

        $id = auth()->user()->_id;
        Redis::zadd("user.{$id}", time(), $tracker->_id);
        return view('tracker.edit', compact('tracker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTrackerRequest $request
     * @param \App\Models\Tracker $tracker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackerRequest $request, Tracker $tracker)
    {
        $this->authorize('view', $tracker);

        $tracker = Tracker::findOrfail($tracker->_id);

        $tracker->title = $request->object;
        $tracker->email = $request->get('email-address');
        $tracker->state_id = State::findBySlug($request->state)->id;

        $tracker->save();
        $id = auth()->user()->_id;
        Redis::zadd("user.{$id}", time(), $tracker->_id);
        return redirect()->route('tracker.show', ['tracker' => $tracker]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tracker $tracker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracker $tracker)
    {
        $this->authorize('view', $tracker);
        Tracker::destroy($tracker->_id);
        $id = auth()->user()->_id;
        Redis::zrem("user.{$id}", time(), $tracker->_id);
        return redirect()->route('homepage');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tracker $tracker
     * @return \Illuminate\Http\Response
     */
    public function tracking(Request $request, Tracker $tracker)
    {

        if ($tracker->state == State::findBySlug('CLD')) {
            return abort(404, 'Page not found.');
        }

        Target::create([
            'ip' => $request->ip(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
            'tracker_id' => $tracker->id,
        ]);

        $sate = State::findBySlug('OPN');
        if ($tracker->state() !== $sate) {
            $tracker->state_id = $sate->id;
            $tracker->save();
        }

        return Storage::response('1x1.png', null, ['Content-Type' => 'image/png']);
    }
}
