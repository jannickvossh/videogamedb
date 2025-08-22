<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Support\Str;
use App\Http\Requests\ValidateDeveloperRequest;

class DeveloperController extends Controller
{
    public function show($slug)
    {
        $developer = Developer::where('slug', $slug)->firstOrFail();

        return view('developer.show', [
            'developer' => $developer
        ]);
    }

    public function create()
    {
        return view('developer.create', []);
    }

    public function store(ValidateDeveloperRequest $request)
    {
        $request->validated();

        $developer = new Developer;

        $developer->name = $request->developer_name;
        $developer->slug = Str::slug($developer->name);

        $developer->save();

        flash($developer->name . ' was created.')->success();

        return redirect()->route('archive', ['attribute' => 'developers']);
    }

    public function edit($slug)
    {
        $developer = Developer::where('slug', $slug)->firstOrFail();

        return view('developer.edit', [
            'developer' => $developer
        ]);
    }

    public function update(ValidateDeveloperRequest $request, $developerId)
    {
        $developer = Developer::where('id', $developerId)->firstOrFail();

        $request->validated();

        $developer->name = $request->developer_name;
        $developer->slug = Str::slug($developer->name);

        $developer->save();

        flash($developer->name . ' was edited.')->success();

        return redirect()->route('archive', ['attribute' => 'developers']);
    }

    public function delete($developerId)
    {
        Developer::where('id', $developerId)->delete();

        flash('The developer was deleted.')->success();

        return redirect()->route('archive', ['attribute' => 'developers']);
    }
}
