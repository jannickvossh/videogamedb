<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game;
use App\Models\GameUser;
use App\Http\Requests\ValidateGameUserRequest;

class GameUserController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('user.games.show', [
            'user' => User::where('id', $user->id)->firstOrFail(),
            'gameUsers' => GameUser::where('user_id', $user->id)->get()
        ]);
    }

    public function create($slug)
    {
        $user = Auth::user();
        $game = Game::where('slug', $slug)->firstOrFail();

        if (! $user->games->find($game->id)) :
            return view('user.games.create', [
                'userId' => $user->id,
                'game' => $game
            ]);
        endif;

        return redirect()->route('show.games.user', []);
    }

    public function store(ValidateGameUserRequest $request)
    {
        $request->validated();

        $gameUser = new GameUser;

        $gameUser->user_id = $request->game_user_user_id;
        $gameUser->game_id = $request->game_user_game_id;
        $gameUser->played = $request->game_user_played ?? 0;
        $gameUser->owns_physically = $request->game_user_owns_physically ?? 0;
        $gameUser->owns_digitally = $request->game_user_owns_digitally ?? 0;
        $gameUser->finished = $request->game_user_finished ?? 0;
        $gameUser->completed = $request->game_user_completed ?? 0;
        $gameUser->finished_on = $request->game_user_finished_on ?? NULL;
        $gameUser->completed_on = $request->game_user_completed_on ?? NULL;
        $gameUser->enjoyed = $request->game_user_enjoyed ?? 1;
        $gameUser->favorite = $request->game_user_favorite ?? 0;

        $gameUser->save();

        flash('Game added.')->success();

        return redirect()->route('show.games.user', []);
    }

    public function edit($slug)
    {
        $user = Auth::user();
        $game = Game::where('slug', $slug)->firstOrFail();

        $gameUser = GameUser::where('user_id', $user->id)->where('game_id', $game->id)->firstOrFail();

        if ($gameUser) :
            return view('user.games.edit', [
                'userId' => $user->id,
                'game' => $game,
                'gameUser' => $gameUser
            ]);
        endif;
    }

    public function update(ValidateGameUserRequest $request, $gameId)
    {
        $user = Auth::user();
        $gameUser = GameUser::where('game_id', $gameId)->where('user_id', $user->id)->firstOrFail();

        $request->validated();

        $gameUser->user_id = $request->game_user_user_id;
        $gameUser->game_id = $request->game_user_game_id;
        $gameUser->played = $request->game_user_played ?? 0;
        $gameUser->owns_physically = $request->game_user_owns_physically ?? 0;
        $gameUser->owns_digitally = $request->game_user_owns_digitally ?? 0;
        $gameUser->finished = $request->game_user_finished ?? 0;
        $gameUser->completed = $request->game_user_completed ?? 0;
        $gameUser->finished_on = $request->game_user_finished_on ?? NULL;
        $gameUser->completed_on = $request->game_user_completed_on ?? NULL;
        $gameUser->enjoyed = $request->game_user_enjoyed ?? 1;
        $gameUser->favorite = $request->game_user_favorite ?? 0;

        $gameUser->save();

        flash('Game edited.')->success();

        return redirect()->route('show.games.user', []);
    }

    public function delete($gameId)
    {
        $user = Auth::user();

        GameUser::where('game_id', $gameId)->where('user_id', $user->id)->delete();

        flash('Game removed.')->success();

        return redirect()->route('show.games.user', []);
    }
}
