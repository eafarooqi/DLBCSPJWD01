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

    protected $casts = [
        'published_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

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
