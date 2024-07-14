<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\GenreService;

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

    public function home()
    {
        View()->share( 'headTitle', $this->headTitle = 'Dashboard');

        $data['booksCount'] = $this->bookService->getBooksCount();
        $data['categoriesCount'] = $this->categoryService->getCategoriesCount();
        $data['genresCount'] = $this->genreService->getGenresCount();

        return view('templates.dashboard.default', $data);
    }
}
