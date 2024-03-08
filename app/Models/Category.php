<?php

namespace App\Models;

use App\Traits\HasUserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasFactory, HasUserTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the user to whom this category belongs to
     *
     * @return BelongsTo
     */
    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent category
     *
     * @return BelongsTo
     */
    protected function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
