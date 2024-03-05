<?php

namespace App\Policies;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Genre $genre): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Genre $genre): bool
    {
    }

    public function delete(User $user, Genre $genre): bool
    {
    }

    public function restore(User $user, Genre $genre): bool
    {
    }

    public function forceDelete(User $user, Genre $genre): bool
    {
    }
}
