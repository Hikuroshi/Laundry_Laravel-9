<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RolePolicy
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

    public function roleAdmin(User $user)
    {
        if (auth()->check()) {
            if (auth()->user()->roles == 'admin') {
                Response::allow();
            }
            Response::deny('Kamu tidak memiliki izin');
        } else {
            return redirect('/login');
        }
    }

    public function roleKasir(User $user)
    {
        return $user->roles === 'kasir' || $user->roles === 'admin' 
            ? Response::allow() 
            : Response::deny('Kamu tidak memiliki izin');
    }

    public function roleOwner(User $user)
    {
        return $user->roles === 'owner' || $user->roles === 'kasir' || $user->roles === 'admin' 
            ? Response::allow() 
            : Response::deny('Kamu tidak memiliki izin');
    }
}
