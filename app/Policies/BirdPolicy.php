<?php

namespace App\Policies;

use App\Models\Bird;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BirdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }
    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return mixed
     */
    public function show(?User $user): bool
    {
            return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Bird $bird
     * @return mixed
     */
    public function update(User $user, Bird $bird): bool
    {
        if ($bird->hasAuthor($user) ) {
            return true;
        }
        return false;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Bird $bird
     * @return mixed
     */
    public function destroy (User $user, Bird $bird): bool
    {
        if ($bird->hasAuthor($user) ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(): bool
    {
            return false;
    }


}
