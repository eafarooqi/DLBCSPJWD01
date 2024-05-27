<?php

namespace App\Livewire\Books\Crud;

use App\Livewire\Books\Forms\BookForm;
use App\Services\BookService;
use App\Services\OpenLibraryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddBook extends Component
{
    use WithFileUploads;

    public BookForm $bookForm;
    private BookService $bookService;
    private OpenLibraryService $openLibraryService;

    public function mount(): void
    {
        // checking if user creating book directly from Open Library search
        $this->loadOlData();
    }

    public function boot(BookService $bookService, OpenLibraryService $openLibraryService): void
    {
        $this->bookService = $bookService;
        $this->openLibraryService = $openLibraryService;
    }

    private function loadOptions(): array
    {
       return $this->bookService->getBookCrudOptions();
    }

    private function loadOlData(): void
    {
        // getting session data
        $olData = session()->get('_ol_input') ?? null;
        if($olData){
            // setting session data to null after loading
            session(['_ol_input' => null]);

            // setting form defaults to passed data.
            $this->bookForm->setDefaults($olData);
        }
    }

    public function add(): RedirectResponse|Redirector
    {
        $this->bookForm->add();
        return redirect()->route('books.index')->with('success', __('Book added successfully'));
    }

    public function render(): View
    {
        return view('livewire.books.add-book', $this->loadOptions());
    }
}
