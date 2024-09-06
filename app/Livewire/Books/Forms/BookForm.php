<?php

namespace App\Livewire\Books\Forms;

use App\Models\Book;
use App\Models\User;
use App\Services\BookService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BookForm extends Form
{
    public ?Book $book;
    public ?User $user;

    #[Validate('required|string|max:191')]
    public ?string $name = null;

    #[Validate('nullable|string|max:191')]
    public ?string $isbn = null;

    #[Validate('nullable|string|max:191')]
    public ?string $author = null;

    #[Validate('integer|nullable')]
    public ?int $genre_id = null;

    #[Validate('integer|nullable')]
    public ?int $category_id = null;

    #[Validate('nullable|string')]
    public ?string $description = null;

    #[Validate('integer|nullable')]
    public ?int $total_pages = null;

    #[Validate('nullable|date')]
    public ?string $published_date = null;

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $image;

    #[Validate('nullable|string|max:255')]
    public ?string $url = null;

    public ?string $ol_image = null;

    /**
     * set edit form to the loaded book.
     *
     * @param Book $book
     * @return void
     */
    public function setBook(Book $book): void
    {
        $this->book = $book;
        $this->name = $book->name;
        $this->isbn = $book->isbn;
        $this->author = $book->author;
        $this->genre_id = $book->genre_id;
        $this->category_id = $book->category_id;
        $this->description = $book->description;
        $this->total_pages = $book->total_pages;
        //$this->image = $book->cover;
        $this->url = $book->url;
    }

    /**
     * load create form with defaults
     *
     * @param array $default
     * @return void
     */
    public function setDefaults(array $default): void
    {
        $this->name = $default['name'];
        $this->isbn = $default['isbn'];
        $this->author = $default['author'];
        $this->total_pages = $default['total_pages'];
        $this->url = $default['url'];
        $this->ol_image = $default['image'];
    }

    /**
     * add new book
     *
     * @return void
     * @throws ValidationException
     */
    public function add(): void
    {
        // validation
        $this->validate();

        // creating new Book
        $book = app(BookService::class)->addBook($this->all());

        // attaching book cover to book if provided.
        app(BookService::class)->attachCover($book, $this->image, $this->ol_image);
    }

    /**
     * update book
     *
     * @return void
     * @throws ValidationException
     */
    public function update(): void
    {
        // validation
        $this->validate();

        // Updating Book
        app(BookService::class)->updateBook($this->book, $this->all());

        // attaching book cover to book if provided.
        app(BookService::class)->attachCover($this->book, $this->image);
    }
}
