<?php

namespace App\Policies;

use App\Models\Paket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PaketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Paket $paket)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Paket $paket)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Paket $paket)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Paket $paket)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Paket $paket)
    {
        return $user->roles === 'admin' ? Response::allow() : Response::deny('Kamu tidak memiliki izin');
    }
}
