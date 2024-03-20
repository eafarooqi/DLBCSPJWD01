<?php

namespace App\Livewire\Books\Crud;

use App\Livewire\Books\Forms\BookForm;
use App\Services\BookService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddBook extends Component
{
    public BookForm $bookForm;
    private BookService $bookService;

    public function boot(BookService $bookService): void
    {
        $this->bookService = $bookService;
    }

    private function loadOptions(): array
    {
       return $this->bookService->getBookCrudOptions();
    }

    public function add()
    {
        $this->bookForm->add();
        return redirect()->route('books.index')->with('success', __('Book added successfully'));
    }

    public function render(): View
    {
        return view('livewire.books.add-book', $this->loadOptions());
    }
}
