<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\GameUser;

class FrontPageController extends Controller
{
    public function index()
    {
        $userId = $gameUser = NULL;

        if (Auth::check() and Auth::user()->isUser()) :
            $userId = Auth::user()->id;
            $gameUser = GameUser::where('user_id', $userId);
        endif;

        return view('home', [
            'games' => Game::orderBy('title')->paginate(9),
            'userId' => $userId,
            'gameUser' => $gameUser
        ]);
    }
}
