<?php

namespace App\Policies;

use App\Models\genre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class genrePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, genre $genre): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, genre $genre): bool
    {
    }

    public function delete(User $user, genre $genre): bool
    {
    }

    public function restore(User $user, genre $genre): bool
    {
    }

    public function forceDelete(User $user, genre $genre): bool
    {
    }
}
