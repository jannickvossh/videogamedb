@extends ('layouts/main')

@section ('title')
    <title>Edit {{ $publisher->name }}</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Edit {{ $publisher->name }}</h1>
        </header>

        @include ('components.form.publisher', [
            'edit' => true
        ])
    </div>
@endsection