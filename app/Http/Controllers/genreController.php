<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Genre::class);

        return Genre::all();
    }

    public function store(GenreRequest $request)
    {
        $this->authorize('create', Genre::class);

        return Genre::create($request->validated());
    }

    public function show(Genre $genre)
    {
        $this->authorize('view', $genre);

        return $genre;
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $this->authorize('update', $genre);

        $genre->update($request->validated());

        return $genre;
    }

    public function destroy(Genre $genre)
    {
        $this->authorize('delete', $genre);

        $genre->delete();

        return response()->json();
    }
}
