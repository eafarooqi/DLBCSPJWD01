<?php

namespace App\Livewire\Books\Crud;

use App\Livewire\Books\Forms\BookForm;
use App\Providers\OpenLibraryServiceProvider;
use App\Services\BookService;
use App\Services\OpenLibraryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddBook extends Component
{
    public BookForm $bookForm;
    private BookService $bookService;
    private OpenLibraryService $openLibraryService;

    public function boot(BookService $bookService, OpenLibraryService $openLibraryService): void
    {
        $this->bookService = $bookService;
        $this->openLibraryService = $openLibraryService;
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

    public function loadBookInformation(): void
    {
        try {
            //$abc = $this->openLibraryService->getBookByIsbn('9781587656187');
            $abc = $this->openLibraryService->getBookByIsbn('9780739408254');
        }
        catch (\Exception $ex){
            //$this->addError('error', $ex->getMessage());
            Session::flash('error', $ex->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.books.add-book', $this->loadOptions());
    }
}
