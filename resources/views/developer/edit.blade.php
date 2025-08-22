@extends ('layouts/main')

@section ('title')
    <title>Edit {{ $developer->name }}</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Edit {{ $developer->name }}</h1>
        </header>

        @include ('components.form.developer', [
            'edit' => true
        ])
    </div>
@endsection