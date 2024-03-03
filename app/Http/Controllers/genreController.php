<?php

namespace App\Http\Controllers;

use App\Http\Requests\genreRequest;
use App\Models\genre;

class genreController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', genre::class);

        return genre::all();
    }

    public function store(genreRequest $request)
    {
        $this->authorize('create', genre::class);

        return genre::create($request->validated());
    }

    public function show(genre $genre)
    {
        $this->authorize('view', $genre);

        return $genre;
    }

    public function update(genreRequest $request, genre $genre)
    {
        $this->authorize('update', $genre);

        $genre->update($request->validated());

        return $genre;
    }

    public function destroy(genre $genre)
    {
        $this->authorize('delete', $genre);

        $genre->delete();

        return response()->json();
    }
}
