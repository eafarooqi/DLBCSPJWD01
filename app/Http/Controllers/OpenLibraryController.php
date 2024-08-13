<?php

namespace App\Http\Controllers;

use App\Services\OpenLibraryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpenLibraryController extends AdminController
{
    public function __construct(
        private readonly OpenLibraryService $openLibraryService,
    )
    {
        parent::__construct();
    }

    /**
     * Display search page.
     *
     * @return View
     */
    public function index(): View
    {
        // Loading search template
        return view('templates.books.open_library.search');
    }

    /**
     * validate and perform OL search.
     *
     * @param Request $request
     * @return View
     * @throws RequestException
     */
    public function search(Request $request)
    {
        // search form validation
        $validated = $request->validate([
            'name' => 'required_without_all:author,isbn|max:255',
            'author' => 'required_without_all:name,isbn|max:255',
            'isbn' => 'required_without_all:author,name|max:255',
        ],
        [
            'name.required_without_all' => 'Please fill at least one field',
            'author.required_without_all' => 'Please fill at least one field',
            'isbn.required_without_all' => 'Please fill at least one field'
        ]
        );

        // calling open library search function.
        $data = $this->openLibraryService->searchBooks($validated['name'], $validated['author'], $validated['isbn']);

        // search template
        return view('templates.books.open_library.search', ['books' => $data, 'search' => $validated]);
    }
}
