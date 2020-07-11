<?php

namespace App\Policies;

use App\User;
use App\UserDetail;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
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
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\UserDetail  $user_detail
     * @return \Illuminate\Auth\Access\Response
     */
    public function update(User $user, UserDetail $user_detail)
    {

        return $user->id === $user_detail->id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }
}
