<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GenreController extends AdminController
{
    public function __construct(
        private readonly GenreService $genreService
    )
    {
        parent::__construct();
    }

    /**
     * listing page for genre.
     *
     * @return View
     */
    public function index(): View
    {
        // Authorization
        $this->authorize('viewAny', Genre::class);

        // Loading listing template
        return view('templates.manage.genre.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        // Authorization
        $this->authorize('create', Genre::class);

        // Loading create template
        return view('templates.manage.genre.create');
    }

    /**
     * create new genre.
     *
     * @param GenreRequest $request
     * @return RedirectResponse
     */
    public function store(GenreRequest $request)
    {
        // Authorization
        $this->authorize('create', Genre::class);

        // Creating new genre
        $this->genreService->addGenre($request->validated());

        // Redirecting back to listing page
        return redirect()->route('manage.genres.index')->with('success', __('Record created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Genre $genre
     * @return Application|Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function edit(Genre $genre)
    {
        // Authorization
        $this->authorize('update', $genre);

        // Loading edit template
        return view('templates.manage.genre.edit', compact('genre'));
    }

    /**
     * update genre.
     *
     * @param GenreRequest $request
     * @param Genre $genre
     * @return RedirectResponse
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        // Authorization
        $this->authorize('update', $genre);

        // Updating genre
        $this->genreService->updateGenre($genre, $request->validated());

        // Redirecting back to listing page
        return redirect()->route('manage.genres.index')->with('success', __('Record updated successfully'));
    }

    /**
     * Display genre in read only mode.
     *
     * @param Genre $genre
     * @return View
     */
    public function show(Genre $genre)
    {
        // Authorization
        $this->authorize('view', $genre);

        // Loading show template
        return view('templates.manage.genre.show', compact('genre'));
    }

    /**
     * Delete genre.
     *
     * @param Genre $genre
     * @return RedirectResponse
     */
    public function destroy(Genre $genre)
    {
        // Authorization
        $this->authorize('delete', $genre);

        // Deleting genre
        $this->genreService->deleteGenre($genre);

        // Redirecting back to listing page
        return redirect()->route('manage.genres.index')->with('success', __('Record successfully deleted'));
    }
}
