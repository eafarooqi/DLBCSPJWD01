<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Collection;

class GenreService extends BaseService
{
    /**
     * Return only parent categories.
     *
     * @return Collection
     */
    public function getGenreOptions(): Collection
    {
        return Genre::optionsWithCache();
    }
}
