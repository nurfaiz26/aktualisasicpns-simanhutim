<?php

namespace App\Policies;

use App\Models\LaporanTravel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LaporanTravelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LaporanTravel $laporanTravel): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user != null && $user->id == 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LaporanTravel $laporanTravel): bool
    {
        return $user != null && $user->id == 1;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LaporanTravel $laporanTravel): bool
    {
        return $user != null && $user->id == 1;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LaporanTravel $laporanTravel): bool
    {
        return $user != null && $user->id == 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LaporanTravel $laporanTravel): bool
    {
        return $user != null && $user->id == 1;
    }
}
