<?php

namespace App\Http\Controllers;

use App\Services\OpenLibraryService;
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

    public function index(): View
    {
        // Loading search template
        return view('templates.books.open_library.search');
    }

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

        //dd($validated);

        $data = $this->openLibraryService->searchBooks($validated['name'], $validated['author'], $validated['isbn']);

        dd($data);



        // Redirecting back to listing page
        //return redirect()->route('manage.genres.index')->with('success', __('Record created successfully'));
    }
}
