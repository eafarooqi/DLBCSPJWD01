<?php

namespace App\Livewire\Books\Forms;

use App\Models\Book;
use App\Models\User;
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
    }

    public function add(): void
    {
        // validation
        $this->validate();

        // creating new Book
        Book::create(
            $this->all()
        );
    }

    public function update(): void
    {
        // validation
        $this->validate();

        // updating Book
        $this->book->update(
            $this->all()
        );
    }
}
