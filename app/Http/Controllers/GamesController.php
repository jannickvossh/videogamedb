<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameUser;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function index()
    {
        $userId = $gameUsers = NULL;

        if (Auth::check() and Auth::user()->isUser()) :
            $userId = Auth::user()->id;
            $gameUsers = GameUser::where('user_id', $userId)->get();
        endif;

        return view('games', [
            'games' => Game::orderBy('title')->paginate(9),
            'userId' => $userId,
            'gameUsers' => $gameUsers
        ]);
    }
}
