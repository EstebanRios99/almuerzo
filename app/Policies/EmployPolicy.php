<?php

namespace App\Policies;

use App\Employ;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any employs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can view the employ.
     *
     * @param  \App\User  $user
     * @param  \App\Employ  $employ
     * @return mixed
     */
    public function view(User $user, Employ $employ)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    public function search(User $user, Employ $employ)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can create employs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can update the employ.
     *
     * @param  \App\User  $user
     * @param  \App\Employ  $employ
     * @return mixed
     */
    public function update(User $user, Employ $employ)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can delete the employ.
     *
     * @param  \App\User  $user
     * @param  \App\Employ  $employ
     * @return mixed
     */
    public function delete(User $user, Employ $employ)
    {
        return $user->isGranted(User::ROLE_SUPERADMIN);
    }

    /**
     * Determine whether the user can restore the employ.
     *
     * @param  \App\User  $user
     * @param  \App\Employ  $employ
     * @return mixed
     */
    public function restore(User $user, Employ $employ)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the employ.
     *
     * @param  \App\User  $user
     * @param  \App\Employ  $employ
     * @return mixed
     */
    public function forceDelete(User $user, Employ $employ)
    {
        //
    }
}
