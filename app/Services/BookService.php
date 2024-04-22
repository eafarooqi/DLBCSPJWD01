<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class BookService extends BaseService
{
    /**
     * Create new book
     *
     * @param array $data
     * @return Book
     */
    public function addBook(array $data): Book
    {
        return Book::create($data);
    }

    /**
     * Update book
     *
     * @param Book $book
     * @param array $data
     * @return bool
     */
    public function updateBook(Book $book, array $data): bool
    {
        return $book->update($data);
    }

    /**
     * Delete Book
     *
     * @param Book $book
     * @return bool
     */
    public function deleteBook(Book $book): bool
    {
        return $book->delete();
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
