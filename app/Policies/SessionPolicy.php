<?php

namespace App\Policies;

use App\Event;
use App\Session;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \App\User  $user
     * @param  \App\Session  $session
     * @return mixed
     */

    public function delete(User $user, Session $session)
    {
        return $user->id==$session->event->user_id;

    }



}
