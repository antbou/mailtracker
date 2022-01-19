<?php

namespace App\Policies;

use App\Models\Tracker;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tracker  $tracker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Tracker $tracker)
    {
        return $user->id === $tracker->user_id;
    }
}
