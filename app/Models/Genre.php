<?php

namespace App\Models;

use App\Traits\HasUserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes, HasFactory, HasUserTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    /**
     * get the user to which this genre is attached to.
     *
     * @return BelongsTo
     */
    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
