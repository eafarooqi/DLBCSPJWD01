<?php

namespace App\Models;

use App\Traits\HasUserTrait;
use App\Traits\OptionsWithCacheTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use SoftDeletes, HasFactory, HasUserTrait, OptionsWithCacheTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * Scope a query to only include parent categories.
     */
    public function scopeParents(Builder $query): void
    {
        $query->whereNull('parent_id');
    }

    /**
     * Get the user to whom this category belongs to
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent category
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the child categories.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
