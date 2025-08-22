@extends ('layouts/main')

@section ('title')
    <title>Create genre</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Create a genre</h1>
        </header>

        @include ('components.form.genre', [
            'edit' => false
        ])
    </div>
@endsection