<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Category $category): bool
    {
        // Category must belong to user.
        return $user->id == $category->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Category $category): bool
    {
        // Category must belong to user.
        return $user->id == $category->user_id;
    }

    public function delete(User $user, Category $category): bool
    {
        // Category must belong to user.
        return $user->id == $category->user_id;
    }

    public function restore(User $user, Category $category): bool
    {
        // Category must belong to user.
        return $user->id == $category->user_id;
    }

    public function forceDelete(User $user, Category $category): bool
    {
        // Category must belong to user.
        return $user->id == $category->user_id;
    }
}
