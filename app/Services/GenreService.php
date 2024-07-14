<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Collection;

class GenreService extends BaseService
{
    /**
     * Create new genre
     *
     * @param array $data
     * @return Genre
     */
    public function addGenre(array $data): Genre
    {
        return Genre::create($data);
    }

    /**
     * Update genre
     *
     * @param Genre $genre
     * @param array $data
     * @return bool
     */
    public function updateGenre(Genre $genre, array $data): bool
    {
        return $genre->update($data);
    }

    /**
     * Delete genre
     *
     * @param Genre $genre
     * @return bool
     */
    public function deleteGenre(Genre $genre): bool
    {
        return $genre->delete();
    }

    /**
     * Return genre list for dropdowns.
     *
     * @return Collection
     */
    public function getGenreOptions(): Collection
    {
        return Genre::optionsWithCache();
    }

    /**
     * Get total genre for the current user
     *
     * @return int
     */
    public function getGenresCount(): int
    {
        return Genre::count();
    }
}
