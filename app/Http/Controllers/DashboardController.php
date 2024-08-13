<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\GenreService;
use Illuminate\View\View;

class DashboardController extends AdminController
{
    public function __construct(
        private readonly BookService $bookService,
        private readonly CategoryService $categoryService,
        private readonly GenreService $genreService,
    )
    {
        parent::__construct();
    }

    /**
     * Display application dashboard.
     *
     * @return View
     */
    public function home()
    {
        // page title
        View()->share( 'headTitle', $this->headTitle = 'Dashboard');

        // getting books count
        $data['booksCount'] = $this->bookService->getBooksCount();

        // getting categories count
        $data['categoriesCount'] = $this->categoryService->getCategoriesCount();

        // getting genre count
        $data['genresCount'] = $this->genreService->getGenresCount();

        // Dashboard template
        return view('templates.dashboard.default', $data);
    }
}
