<?php

namespace App\Models;

use App\Traits\HasUserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes, HasFactory, HasUserTrait;

    protected $fillable = [
        'name',
        'isbn',
        'author',
        'description',
        'published_date',
        'total_pages',
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    protected function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
