<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Platform;
use App\Models\Genre;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\GamePlatform;
use App\Models\GameGenre;
use App\Models\DeveloperGame;
use App\Models\GamePublisher;
use App\Models\GameUser;
use Illuminate\Support\Str;
use App\Http\Requests\ValidateGameRequest;
use App\Http\Requests\ValidateSearchGamesRequest;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private function deletePivotData($game, $model)
    {
        $table = new $model;
        $table::where('game_id', $game->id)->delete();
    }

    private function addPivotData($game, $field, $model, $column)
    {
        foreach ($field as $item) :
            $pivotModel = new $model;

            $pivotModel->game_id = $game->id;
            $pivotModel->$column = $item;

            $pivotModel->save();
        endforeach;
    }

    public function show($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();
        $gameUser = '';

        if (Auth::check() and Auth::user()->isUser()) :
            $user = Auth::user();
            $gameUser = GameUser::where('game_id', $game->id)->where('user_id', $user->id)->first();
        endif;

        return view('game.show', [
            'game' => $game,
            'gameUser' => $gameUser
        ]);
    }

    public function create()
    {
        return view('game.create', [
            'platforms'     => Platform::orderBy('name')->get(),
            'genres'        => Genre::orderBy('name')->get(),
            'developers'    => Developer::orderBy('name')->get(),
            'publishers'    => Publisher::orderBy('name')->get()
        ]);
    }

    public function store(ValidateGameRequest $request)
    {
        $request->validated();

        if ($request->hasFile('game_image')) :
            $fileName = $request->game_image->getClientOriginalName();
            $request->file('game_image')->storeAs('game_images', $fileName, 'public');
        endif;

        $game = new Game;

        $game->title = $request->game_title;
        $game->slug = Str::slug($request->game_title);
        $game->image = $fileName ?? NULL;

        $game->save();

        $this->addPivotData($game, $request->game_platforms, GamePlatform::class, 'platform_id');
        $this->addPivotData($game, $request->game_genres, GameGenre::class, 'genre_id');
        $this->addPivotData($game, $request->game_developers, DeveloperGame::class, 'developer_id');
        $this->addPivotData($game, $request->game_publishers, GamePublisher::class, 'publisher_id');

        flash('You have created the game ' . $game->title . '')->success();

        return redirect()->route('games');
    }

    public function edit($slug)
    {
        $game = Game::where('slug', $slug)->firstOrFail();

        return view('game.edit', [
            'game'              => $game,
            'platforms'         => Platform::orderBy('name')->get(),
            'genres'            => Genre::orderBy('name')->get(),
            'developers'        => Developer::orderBy('name')->get(),
            'publishers'        => Publisher::orderBy('name')->get(),
            'games_platforms'   => GamePlatform::get(),
            'games_genres'      => GameGenre::get(),
            'developers_games'  => DeveloperGame::get(),
            'games_publishers'  => GamePublisher::get()
        ]);
    }

    public function update(ValidateGameRequest $request, $gameId)
    {
        $game = Game::where('id', $gameId)->firstOrFail();

        $request->validated();

        if ($game->image) :
            $fileName = $game->image;
        endif;

        if ($request->hasFile('game_image')) :
            $fileName = $request->game_image->getClientOriginalName();
            $request->file('game_image')->storeAs('game_images', $fileName, 'public');
        endif;

        $game->title = $request->game_title;
        $game->slug = Str::slug($request->game_title);
        $game->image = $fileName ?? NULL;
        $game->release_date = $request->game_release_date;

        $game->save();

        $this->deletePivotData($game, GamePlatform::class);
        $this->addPivotData($game, $request->game_platforms, GamePlatform::class, 'platform_id');

        $this->deletePivotData($game, GameGenre::class);
        $this->addPivotData($game, $request->game_genres, GameGenre::class, 'genre_id');

        $this->deletePivotData($game, DeveloperGame::class);
        $this->addPivotData($game, $request->game_developers, DeveloperGame::class, 'developer_id');

        $this->deletePivotData($game, GamePublisher::class);
        $this->addPivotData($game, $request->game_publishers, GamePublisher::class, 'publisher_id');

        flash($game->title . ' was edited.')->success();

        return redirect()->route('games');
    }

    public function delete($gameId)
    {
        Game::where('id', $gameId)->delete();

        flash('The game was deleted.')->success();

        return redirect()->route('games');
    }

    public function search(ValidateSearchGamesRequest $request)
    {
        $request->validated();

        $userId = $gameUsers = NULL;

        if (Auth::check() and Auth::user()->isUser()) :
            $userId = Auth::user()->id;
            $gameUsers = GameUser::where('user_id', $userId)->get();
        endif;

        $search = $request->search_games;
        $results = Game::where('title', 'like', "%$search%")->paginate(9);

        $search = $request->input('search_games');

        return view('game.search', [
            'results' => $results,
            'search' => $search,
            'userId' => $userId,
            'gameUsers' => $gameUsers
        ]);
    }
}
