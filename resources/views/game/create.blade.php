@extends ('layouts/main')

@section('title')
    <title>Create game</title>
@endsection

@section('content')
    <div class="container pt-3 pt-4">
        <header>
            <h1>Create a game</h1>
        </header>

        @include ('components.form.game', [
            'edit' => false
        ])
    </div>
@endsection
