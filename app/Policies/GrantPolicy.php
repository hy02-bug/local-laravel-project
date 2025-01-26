<?php

namespace App\Policies;

use App\Models\Grant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GrantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    use HandlesAuthorization;
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Grant $grant): bool
    {
        return $user->role_id === 1 || $user->id === $grant->project_leader_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Grant $grant): bool
    {
        return $user->role_id === 1 || $user->id === $grant->project_leader_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Grant $grant): bool
    {
        return $user->role_id === 1;
    }

    public function deleteMember(User $user, Grant $grant): bool
    {
        return $user->role_id === 1 || $user->id === $grant->project_leader_id;
    }

}
