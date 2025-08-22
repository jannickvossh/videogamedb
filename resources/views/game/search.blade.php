@extends ('layouts/main')

@section ('title')
    <title>Search results for: {{ $search }}</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4 position-relative">
        <header class="mb-4">
            <h1>Search results for: <strong>{{ $search }}</strong></h1>
        </header>

        @if (count($results) > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @foreach ($results as $result)
                    <div class="col">
                        <a href="{{ route('show.game', ['game' => $result->slug]) }}" class="text-decoration-none">
                            <div class="card">
                                @if ($result->image)
                                    <img 
                                        src="{{ URL::asset('/game_images/' . $result->image) }}" 
                                        alt="{{ $result->title }} cover" 
                                        class="card-img"
                                    >
                                @endif

                                <div class="card-body">
                                    <h2 class="card-title fs-4 mb-0">
                                        {{ $result->title }}
                                        @can('is_user')
                                            @foreach ($gameUsers as $gameUser)
                                                @if ($gameUser->game_id == $result->id and $gameUser->favorite)
                                                    <span class="star"></span>
                                                @endif
                                            @endforeach
                                        @endcan
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>No results found.</p>
        @endif

        {{ $results->links() }}
    </div>
@endsection