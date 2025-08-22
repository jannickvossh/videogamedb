<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\ValidatePublisherRequest;
use Illuminate\Support\Str;

class PublisherController extends Controller
{
    public function show($slug)
    {
        $publisher = Publisher::where('slug', $slug)->firstOrFail();

        return view('publisher.show', [
            'publisher' => $publisher
        ]);
    }

    public function create()
    {
        return view('publisher.create', []);
    }

    public function store(ValidatePublisherRequest $request)
    {
        $request->validated();

        $publisher = new Publisher;

        $publisher->name = $request->publisher_name;
        $publisher->slug = Str::slug($publisher->name);

        $publisher->save();

        flash($publisher->name . ' was created.')->success();

        return redirect()->route('archive', ['attribute' => 'publishers']);
    }

    public function edit($slug)
    {
        $publisher = Publisher::where('slug', $slug)->firstOrFail();

        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    public function update(ValidatePublisherRequest $request, $publisherId)
    {
        $publisher = Publisher::where('id', $publisherId)->firstOrFail();

        $request->validated();

        $publisher->name = $request->publisher_name;
        $publisher->slug = Str::slug($publisher->name);

        $publisher->save();

        flash($publisher->name . ' was edited.')->success();

        return redirect()->route('archive', ['attribute' => 'publishers']);
    }

    public function delete($publisherId)
    {
        Publisher::where('id', $publisherId)->delete();

        flash('The publisher was deleted.')->success();

        return redirect()->route('archive', ['attribute' => 'publishers']);
    }
}
