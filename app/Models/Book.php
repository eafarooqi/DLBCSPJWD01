<?php

namespace App\Models;

use App\Traits\HasUserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use SoftDeletes, HasFactory, HasUserTrait;

    /**
     * fillable attributes on this model.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'isbn',
        'author',
        'genre_id',
        'category_id',
        'language_id',
        'description',
        'published_date',
        'total_pages',
        'url',
    ];


    /**
     * casting model attributes.
     *
     * @var string[]
     */
    protected $casts = [
        'published_date' => 'date',
    ];

    /**
     * getting book user.
     * who has created the book in system.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * getting book category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * getting book genre.
     *
     * @return BelongsTo
     */
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * getting book language.
     *
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * generate book cover file name
     *
     * @param $cover
     * @return string
     */
    public function getCoverFileName($cover): string
    {
        return $this->id . '.'.$cover->guessExtension();
    }

    /**
     * Get the user's first name.
     */
    protected function cover(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Storage::disk('covers')->url($value) : '',
        );
    }
}
