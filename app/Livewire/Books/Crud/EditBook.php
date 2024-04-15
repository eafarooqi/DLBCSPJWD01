<?php

namespace App\Livewire\Books\Crud;

use App\Livewire\Books\Forms\BookForm;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBook extends Component
{
    use WithFileUploads;

    public BookForm $bookForm;
    private BookService $bookService;

    public function boot(BookService $bookService): void
    {
        $this->bookService = $bookService;
    }

    public function mount(Book $book): void
    {
        $this->bookForm->setBook($book);
    }

    private function loadOptions(): array
    {
       return $this->bookService->getBookCrudOptions();
    }

    public function update(): void
    {
        $this->bookForm->update();
        $this->dispatch('toast:alert', message: 'Book updated successfully', title: 'Success', status: 1);
    }

    public function render(): View
    {
        return view('livewire.books.edit-book', $this->loadOptions());
    }
}
