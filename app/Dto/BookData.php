<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BookData extends Data
{
    #[Computed]
    public string $isbnSelected;

    #[Computed]
    public int $id;

    #[Computed]
    public string $author;

    #[Computed]
    public string $imageUrl;

    #[Computed]
    public string $bookUrl;

    public function __construct(
        #[MapInputName('title')]
        public string $name,

        #[MapInputName('cover_edition_key')]
        public string $coverEditionKey='',

        public array $author_name = [],

        #[MapInputName('number_of_pages_median')]
        public int|Optional $totalPages=0,

        #[MapInputName('isbn')]
        public array $all_isbn=[],

    ) {
        $this->isbnSelected = ($this->all_isbn[0] ?? '');
        $this->author = ($this->author_name[0] ?? '');
        $this->id = $this->isbnSelected ? intval($this->isbnSelected) : intval(uniqid(rand(1000, 9999)));
        $this->setUrls();
    }

    private function setUrls(): void
    {
        // setting image URL
        $this->setImageURL();

        // setting book URL
        $this->setBookURL();
    }

    /**
     * set book cover url
     * default is set to placeholder
     *
     * @return void
     */
    private function setImageURL(): void
    {
        // setting image URL
        $this->imageUrl = asset('assets/img/book-placeholder.jpg');
        if($this->isbnSelected) {
            $this->imageUrl = 'https://covers.openlibrary.org/b/isbn/' . $this->isbnSelected . '-M.jpg';
        }
    }

    /**
     * set book online link
     *
     * @return void
     */
    private function setBookURL(): void
    {
        // setting book URL
        if($this->coverEditionKey) {
            $this->bookUrl = 'https://openlibrary.org/books/' . $this->coverEditionKey;
        }
    }
}
