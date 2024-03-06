<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Models\Management\Advice;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class GenreController extends AdminController
{
    public function index(): View
    {
        $this->authorize('viewAny', Genre::class);
        return view('templates.manage.genre.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Genre::class);
        return view('templates.manage.genre.create');
    }

    public function store(GenreRequest $request)
    {
        $this->authorize('create', Genre::class);
        Genre::create($request->validated());
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
        $this->authorize('update', $genre);
        return view('templates.manage.genre.edit', compact('genre'));
    }

    public function show(Genre $genre)
    {
        $this->authorize('view', $genre);
        return view('templates.manage.genre.show', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $this->authorize('update', $genre);
        $genre->update($request->validated());
        return redirect()->route('manage.genres.index')->with('success', __('Record updated successfully'));
    }

    public function destroy(Genre $genre)
    {
        $this->authorize('delete', $genre);
        $genre->delete();
        return redirect()->route('manage.genres.index')->with('success', __('Record successfully deleted'));
    }
}
