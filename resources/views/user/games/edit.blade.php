@extends ('layouts/main')

@section('title')
    <title>Edit {{ $game->title }}</title>
@endsection

@section('content')
    <div class="container pt-3 pt-4">
        <header>
            <h1>Edit {{ $game->title }}</h1>
        </header>

        @include ('components.form.gameuser', [
            'edit' => true
        ])
    </div>
@endsection
