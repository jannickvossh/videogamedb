@extends ('layouts/main')

@section ('title')
    <title>My games</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4 position-relative">
        <header class="mb-4">
            <h1>My games</h1>
        </header>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
            @foreach ($user->games as $game)
                <div class="col">
                    <a href="{{ route('show.game', ['game' => $game->slug]) }}" class="text-decoration-none">
                        <div class="card">
                            @if ($game->image)
                                <img 
                                    src="{{ URL::asset('/game_images/' . $game->image) }}" 
                                    alt="{{ $game->title }} cover" 
                                    class="card-img"
                                >
                            @endif

                            <div class="card-body">
                                <h2 class="card-title fs-4 mb-0">
                                    {{ $game->title }}
                                    @foreach ($gameUsers as $gameUser)
                                        @if ($gameUser->game_id == $game->id and $gameUser->favorite)
                                            <span class="star"></span>
                                        @endif
                                    @endforeach
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection