<?php

namespace App\Policies;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
{
    use HandlesAuthorization;

    /**
     * Access logic can be built here.
     * Access is already restricted to current user only. Logged in
     * user can only see his/her own Genre. so returning true.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Genre $genre): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Genre $genre): bool
    {
        return true;
    }

    public function delete(User $user, Genre $genre): bool
    {
        return true;
    }

    public function restore(User $user, Genre $genre): bool
    {
        return true;
    }

    public function forceDelete(User $user, Genre $genre): bool
    {
        return true;
    }
}
