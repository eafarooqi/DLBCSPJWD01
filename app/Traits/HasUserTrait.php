<?php

namespace App\Traits;

use App\Models\Scopes\UserScope;
use Illuminate\Support\Facades\Auth;

/**
 * Class HasUserTrait
 *
 * user_id columns is needed on model.
 * default value is set to user_id.
 * Add current user id into user_id column on each new create
 * define a constant USER_ID in model to override column name
 * example: const USER_ID = 'user_fk';
 *
 * @package App
 */
trait HasUserTrait
{
    public static function bootHasUserTrait(): void
    {
        // Applying global scope to all queries.
        // This will restrict queries to only current user.
        static::addGlobalScope(new UserScope);

        // adding automatically user id to each insert query
        // for the models using this trait.
        static::creating(function ($model) {
            $column = static::getUserIdColumn();
            $model->$column = Auth::id();
        });
    }

    /**
     * Get the name of the "User id" column.
     *
     * @return string
     */
    public static function getUserIdColumn(): string
    {
        return defined(static::class.'::USER_ID') ? static::USER_ID : 'user_id';
    }
}
