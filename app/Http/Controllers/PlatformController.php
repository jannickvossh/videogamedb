<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Support\Str;
use App\Http\Requests\ValidatePlatformRequest;

class PlatformController extends Controller
{
    public function show($slug)
    {
        $platform = Platform::where('slug', $slug)->firstOrFail();

        return view('platform.show', [
            'platform' => $platform
        ]);
    }

    public function create()
    {
        return view('platform.create', []);
    }

    public function store(ValidatePlatformRequest $request)
    {
        $request->validated();

        $platform = new Platform;

        $platform->name = $request->platform_name;
        $platform->slug = Str::slug($platform->name);

        $platform->save();

        flash($platform->name . ' was created.')->success();

        return redirect()->route('archive', ['attribute' => 'platforms']);
    }

    public function edit($slug)
    {
        $platform = Platform::where('slug', $slug)->firstOrFail();

        return view('platform.edit', [
            'platform' => $platform
        ]);
    }

    public function update(ValidatePlatformRequest $request, $platformId)
    {
        $platform = Platform::where('id', $platformId)->firstOrFail();

        $request->validated();

        $platform->name = $request->platform_name;
        $platform->slug = Str::slug($platform->name);

        $platform->save();

        flash($platform->name . ' was edited.')->success();

        return redirect()->route('archive', ['attribute' => 'platforms']);
    }

    public function delete($platformId)
    {
        Platform::where('id', $platformId)->delete();

        flash('The platform was deleted.')->success();

        return redirect()->route('archive', ['attribute' => 'platforms']);
    }
}
