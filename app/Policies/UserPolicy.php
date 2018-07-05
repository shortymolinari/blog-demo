<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //Este metodo se ejecuta antes que cualquier otro en las politicas
    public function before(User $user){

        if( $user->hasRole('Admin') ){
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    //El User $user es el usuario que esta actualmente autenticado | User $model el el usuario que intentamos ver
    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('View users');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return $user->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
       return $authUser->id === $user->id || $user->hasPermissionTo('Update users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Delete users');
    }
}
