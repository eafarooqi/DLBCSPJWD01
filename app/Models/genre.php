<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ScopedBy([UserScope::class])]
class genre extends Model
{
    use SoftDeletes, HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
