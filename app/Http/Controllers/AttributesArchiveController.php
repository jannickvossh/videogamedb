<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Genre;
use App\Models\Developer;
use App\Models\Publisher;

class AttributesArchiveController extends Controller
{
    public function index($slug)
    {
        switch ($slug) :
            case 'platforms':
                $model = Platform::orderBy('name')->get();
                break;
            case 'genres':
                $model = Genre::orderBy('name')->get();
                break;
            case 'developers':
                $model = Developer::orderBy('name')->get();
                break;
            case 'publishers':
                $model = Publisher::orderBy('name')->get();
                break;
        endswitch;

        return view('archive.attributes', [
            'attributes'    => $model,
            'slug'          => substr($slug, 0, -1),
            'title'         => ucwords($slug)
        ]);
    }
}
