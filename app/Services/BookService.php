<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

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

    /**
     * return options for the dropdowns used on the crud screens.
     *
     * @return array
     */
    public function getBookCrudOptions(): array
    {
        $data['genreOptions'] = Genre::optionsWithCache();
        $data['categoryOptions'] = Category::getCategoryOptionsWithGroup();
        return $data;
    }

    /**
     * add cover image to the given book
     *
     * @param Book $book
     * @param $cover
     * @return bool
     */
    public function attachCover(Book $book, $cover): bool
    {
        if(!$cover){
            return false;
        }

        // getting file name
        $fileName = $book->getCoverFileName($cover);

        // attaching file with given book
        $cover->storeAs(path: 'covers', name: $fileName);
        $book->cover = $fileName;
        $book->save();

        return true;
    }

    /**
     * remove cover image from the given book
     *
     * @param Book $book
     * @return bool
     */
    public function removeCover(Book $book): bool
    {
        // Book has no cover.
        if(!$book->cover){
            return true;
        }

        // getting book cover file
        $fileName = $book->getRawOriginal('cover');

        // Deleting the file from storage.
        try {
            if(Storage::disk('covers')->exists($fileName)) {
                Storage::disk('covers')->delete($fileName);
            }
        }
        catch (\Exception $exception){
            return false;
        }

        // setting cover to null after file deletion.
        $book->cover = null;
        $book->save();

        return true;
    }
}
