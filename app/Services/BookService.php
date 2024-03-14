<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;

class BookService extends BaseService
{
    /**
     * Return only parent categories.
     *
     * @return Collection
     */
    public function getParentCategories(): Collection
    {
        return Category::parents()->pluck('name','id');
    }
}
