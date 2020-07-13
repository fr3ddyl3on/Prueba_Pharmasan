<?php

namespace App\Policies;

use App\Client;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $userlog
     * @return mixed
     */
    public function viewAny(User $userlog)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $userlog
     * @param  \App\Client  $client
     * @return mixed
     */
    public function view(User $userlog, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $userlog
     * @return mixed
     */
    public function create(User $userlog)
    {
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $userlog
     * @param  \App\Client  $client
     * @return mixed
     */
    public function update(User $userlog, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $userlog
     * @param  \App\Client  $client
     * @return mixed
     */
    public function delete(User $userlog, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $userlog
     * @param  \App\Client  $client
     * @return mixed
     */
    public function restore(User $userlog, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $userlog
     * @param  \App\Client  $client
     * @return mixed
     */
    public function forceDelete(User $userlog, Client $client)
    {
        //
    }
}
