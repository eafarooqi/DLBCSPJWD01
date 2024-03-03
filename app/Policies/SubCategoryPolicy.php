<?php

namespace App\Policies;

use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, SubCategory $subCategory): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, SubCategory $subCategory): bool
    {
    }

    public function delete(User $user, SubCategory $subCategory): bool
    {
    }

    public function restore(User $user, SubCategory $subCategory): bool
    {
    }

    public function forceDelete(User $user, SubCategory $subCategory): bool
    {
    }
}
