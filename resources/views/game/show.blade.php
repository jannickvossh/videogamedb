@extends ('layouts/main')

@section('title')
    <title>{{ $game->title }} - My Video Game DB</title>
@endsection

@section('content')
    <article>
        <header class="hero pt-4 pb-4 bg-dark-subtle">
            <div class="container row mx-auto">
                <div class="col-2">
                    @if ($game->image)
                        <img src="{{ URL::asset('/game_images/' . $game->image) }}" alt="{{ $game->title }} cover"
                            class="hero__game-cover">
                    @endif
                </div>
                <div class="col-10">
                    <h1 class="game__title mb-4">
                        {{ $game->title }}
                        @can('is_user')
                            @if ($gameUser and $gameUser->favorite == 1)
                                <span class="star"></span>
                            @endif
                        @endcan
                    </h1>

                    <p class="mb-1"><strong>Released on:</strong> {{ $game->release_date }}</p>
                </div>
            </div>
        </header>
        <main class="content">
            <div class="p-3 bg-black text-light">
                <div class="container mx-auto">
                    <div class="row">
                        <div class="col">
                            <p>
                                <strong>Platforms:</strong>
                                @foreach ($game->platforms as $platform)
                                    <a href="{{ route('show.platform', ['platform' => $platform->slug]) }}">
                                        {{ $platform->name }}
                                    </a>
                                @endforeach
                            </p>
                            <p>
                                <strong>Genres:</strong>
                                @foreach ($game->genres as $genre)
                                    <a href="{{ route('show.genre', ['genre' => $genre->slug]) }}">
                                        {{ $genre->name }}
                                    </a>
                                @endforeach
                            </p>
                        </div>

                        <div class="col">
                            <p>
                                <strong>Developers:</strong>
                                @foreach ($game->developers as $developer)
                                    <a href="{{ route('show.developer', ['developer' => $developer->slug]) }}">
                                        {{ $developer->name }}
                                    </a>
                                @endforeach
                            </p>
                            <p>
                                <strong>Publishers:</strong>
                                @foreach ($game->publishers as $publisher)
                                    <a href="{{ route('show.publisher', ['publisher' => $publisher->slug]) }}">
                                        {{ $publisher->name }}
                                    </a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </article>

    @can('is_admin')
        <div class="container pt-4 pb-4">
            <div class="btn-group" role="group">
                <a class="btn btn-primary" href="{{ route('edit.game', ['game' => $game->slug]) }}">Edit game</a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete game</button>
            </div>
        </div>

        <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="confirmDeleteLabel">Delete game</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this game? This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('delete.game', ['game' => $game->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes, delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('is_user')
        <div class="container pt-4 pb-4">
            @if ($game->users->count() === 0)
                <a class="btn btn-primary" href="{{ route('create.games.user', ['game' => $game->slug]) }}">Add game</a>
            @else
                <div class="btn-group" role="group">
                    <a class="btn btn-secondary" href="{{ route('edit.games.user', ['game' => $game->slug]) }}">Edit game</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Remove game</button>
                </div>
            @endif
        </div>

        <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="confirmDeleteLabel">Remove game</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to remove this game from your game list?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('delete.games.user', ['game' => $game->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes, remove</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
