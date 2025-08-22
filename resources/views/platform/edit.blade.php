@extends ('layouts/main')

@section ('title')
    <title>Edit {{ $platform->name }}</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Edit {{ $platform->name }}</h1>
        </header>

        @include ('components.form.platform', [
            'edit' => true
        ])
    </div>
@endsection