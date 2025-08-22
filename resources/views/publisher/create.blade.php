@extends ('layouts/main')

@section ('title')
    <title>Create publisher</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Create a publisher</h1>
        </header>

        @include ('components.form.publisher', [
            'edit' => false
        ])
    </div>
@endsection