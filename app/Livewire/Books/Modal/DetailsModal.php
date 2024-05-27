<?php

namespace App\Livewire\Books\Modal;

use App\Services\BookService;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class DetailsModal extends Component
{
    public $details=null;

    private BookService $bookService;

    public function boot(BookService $bookService): void
    {
        $this->bookService = $bookService;
    }

    #[On('loadBookDetails')]
    public function loadDetails($details): void
    {
        $this->details = $details;
        $this->dispatch('ShowOLSearchDetailModal');
    }

    /**
     * loading create screen with the selected book data.
     * @return void
     */
    public function addToCollection(): void
    {
        if($this->bookService->addOLItemToCollection($this->details)){
            $this->redirectRoute('books.create');
        }
    }

    public function render(): View
    {
        return view('livewire.books.details-modal')->section('modals');
    }
}
