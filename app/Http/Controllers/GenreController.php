<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Support\Str;
use App\Http\Requests\ValidateGenreRequest;

class GenreController extends Controller
{
    public function show($slug)
    {
        $genre = Genre::where('slug', $slug)->firstOrFail();

        return view('genre.show', [
            'genre' => $genre
        ]);
    }

    public function create()
    {
        return view('genre.create', []);
    }

    public function store(ValidateGenreRequest $request)
    {
        $request->validated();

        $genre = new Genre;

        $genre->name = $request->genre_name;
        $genre->slug = Str::slug($genre->name);

        $genre->save();

        flash($genre->name . ' was created.')->success();

        return redirect()->route('archive', ['attribute' => 'genres']);
    }

    public function edit($slug)
    {
        $genre = Genre::where('slug', $slug)->firstOrFail();

        return view('genre.edit', [
            'genre' => $genre
        ]);
    }

    public function update(ValidateGenreRequest $request, $genreId)
    {
        $genre = Genre::where('id', $genreId)->firstOrFail();

        $request->validated();

        $genre->name = $request->genre_name;
        $genre->slug = Str::slug($genre->name);

        $genre->save();

        flash($genre->name . ' was edited.')->success();

        return redirect()->route('archive', ['attribute' => 'genres']);
    }

    public function delete($genreId)
    {
        Genre::where('id', $genreId)->delete();

        flash('The genre was deleted.')->success();

        return redirect()->route('archive', ['attribute' => 'genres']);
    }
}