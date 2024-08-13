<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;

    /**
     * fillable attributes on this model.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code',
    ];
}
