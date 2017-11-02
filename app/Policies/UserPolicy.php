<?php

namespace App\Policies;

use App\Entities\Users\User;
use App\Entities\Users\User as Worker;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\Entities\Users\User  $user
     * @param  \App\Entities\Users\User  $user
     * @return mixed
     */
    public function view(User $user, Worker $worker)
    {
        return $user->id == $user->id;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\Entities\Users\User  $user
     * @param  \App\Entities\Users\User  $user
     * @return mixed
     */
    public function create(User $user, Worker $worker)
    {
        return  !  ! $user->agency;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\Entities\Users\User  $user
     * @param  \App\Entities\Users\User  $user
     * @return mixed
     */
    public function update(User $user, Worker $worker)
    {
        return $user->agency->workers->contains($worker);
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\Entities\Users\User  $user
     * @param  \App\Entities\Users\User  $user
     * @return mixed
     */
    public function delete(User $user, Worker $worker)
    {
        return $this->update($user, $worker);
    }
}