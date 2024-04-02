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
    public string $author;

    public function __construct(
        #[MapInputName('title')]
        public string $name,

        public array|Optional $author_name,

        #[MapInputName('isbn')]
        public array $all_isbn,

        #[MapInputName('number_of_pages_median')]
        public int|Optional $totalPages,
    ) {
        $this->isbnSelected = ($this->all_isbn[0] ?? '');
        $this->author = ($this->author_name[0] ?? '');
    }
}
