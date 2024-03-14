<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\GenreService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class BookController extends AdminController
{
    public function __construct(
        private readonly BookService $bookService,
        private readonly GenreService $genreServiceService,
        private readonly CategoryService $categoryService,
    )
    {
        parent::__construct();
    }

    public function index(): View
    {
        $this->authorize('viewAny', Book::class);
        return view('templates.books.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Book::class);

        $data['genreOptions'] = $this->genreServiceService->getGenreOptions();
        return view('templates.books.book.create', $data);
    }

    public function store(BookRequest $request)
    {
        $this->authorize('create', Book::class);
        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', __('Record created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $genre
     * @return Application|Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('templates.books.book.edit', compact('book'));
    }

    public function show(Book $book)
    {
        $this->authorize('view', $book);
        return view('templates.books.book.show', compact('book'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $this->authorize('update', $book);
        $book->update($request->validated());
        return redirect()->route('books.index')->with('success', __('Record updated successfully'));
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return redirect()->route('books.index')->with('success', __('Record successfully deleted'));
    }
}
