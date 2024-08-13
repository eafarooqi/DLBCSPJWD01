<?php

namespace App\Models;

use App\Traits\HasUserTrait;
use App\Traits\OptionsWithCacheTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes, HasFactory, HasUserTrait, OptionsWithCacheTrait;

    public $timestamps = false;

    /**
     * fillable attributes on this model.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * get the user to which this genre is attached to.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the books for the genre.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'genre_id');
    }
}
