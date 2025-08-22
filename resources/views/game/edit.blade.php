@extends ('layouts/main')

@section('title')
    <title>Edit {{ $game->title }}</title>
@endsection

@section('content')
    <div class="container pt-3 pb-4">
        <header>
            <h1>Edit {{ $game->title }}</h1>
        </header>

        @include ('components.form.game', [
            'edit' => true,
            'game' => $game
        ])
    </div>
@endsection
