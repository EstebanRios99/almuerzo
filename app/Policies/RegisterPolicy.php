<?php

namespace App\Policies;

use App\Register;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegisterPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }


    /**
     * Determine whether the user can view any registers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the register.
     *
     * @param  \App\User  $user
     * @param  \App\Register  $register
     * @return mixed
     */
    public function view(User $user, Register $register)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can create registers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can update the register.
     *
     * @param  \App\User  $user
     * @param  \App\Register  $register
     * @return mixed
     */
    public function update(User $user, Register $register)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can delete the register.
     *
     * @param  \App\User  $user
     * @param  \App\Register  $register
     * @return mixed
     */
    public function delete(User $user, Register $register)
    {
        return $user->isGranted(User::ROLE_SUPERADMIN);
    }

    /**
     * Determine whether the user can restore the register.
     *
     * @param  \App\User  $user
     * @param  \App\Register  $register
     * @return mixed
     */
    public function restore(User $user, Register $register)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the register.
     *
     * @param  \App\User  $user
     * @param  \App\Register  $register
     * @return mixed
     */
    public function forceDelete(User $user, Register $register)
    {
        //
    }
}
