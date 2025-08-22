@extends ('layouts/main')

@section ('title')
    <title>Create platform</title>
@endsection

@section ('content')
    <div class="container pt-3 pb-4">
        <header class="mb-4">
            <h1>Create a platform</h1>
        </header>

        @include ('components.form.platform', [
            'edit' => false
        ])
    </div>
@endsection