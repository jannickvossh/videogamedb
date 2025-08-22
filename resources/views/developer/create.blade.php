@extends ('layouts/main')

@section ('title')
    <title>Create developer</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Create a developer</h1>
        </header>

        @include ('components.form.developer', [
            'edit' => false
        ])
    </div>
@endsection