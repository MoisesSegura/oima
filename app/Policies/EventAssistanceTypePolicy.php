<?php

namespace App\Policies;

use App\Models\EventAssistanceType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventAssistanceTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventAssistanceType $eventAssistanceType): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventAssistanceType $eventAssistanceType): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventAssistanceType $eventAssistanceType): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventAssistanceType $eventAssistanceType): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventAssistanceType $eventAssistanceType): bool
    {
        return $user->hasRole('Admin');
    }
}
