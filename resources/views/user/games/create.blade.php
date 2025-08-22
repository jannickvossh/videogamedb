@extends ('layouts/main')

@section('title')
    <title>Add {{ $game->title }}</title>
@endsection

@section('content')
    <div class="container pt-3 pt-4">
        <header>
            <h1>Add {{ $game->title }}</h1>
        </header>

        @include ('components.form.gameuser', [
            'edit' => false
        ])
    </div>
@endsection
