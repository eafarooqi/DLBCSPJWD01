<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class BookController extends AdminController
{
    public function __construct(
        private readonly BookService $bookService,
    )
    {
        parent::__construct();
    }

    public function index(): View
    {
        // Authorization
        $this->authorize('viewAny', Book::class);

        // Loading listing template
        return view('templates.books.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        // Authorization
        $this->authorize('create', Book::class);

        // Loading create template
        return view('templates.books.book.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Book $book)
    {
        // Authorization
        $this->authorize('update', $book);

        // Loading edit template
        return view('templates.books.book.edit', compact('book'));
    }

    public function show(Book $book)
    {
        // Authorization
        $this->authorize('view', $book);

        // Loading show template
        return view('templates.books.book.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        // Authorization
        $this->authorize('delete', $book);

        // Deleting book
        $this->bookService->deleteBook($book);

        // Redirecting back to listing page
        return redirect()->route('books.index')->with('success', __('Record successfully deleted'));
    }
}
