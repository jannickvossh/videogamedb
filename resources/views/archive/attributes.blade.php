@extends ('layouts/main')

@section ('title')
    <title>{{ $title }}</title>
@endsection

@section ('content')
    <div class="min-vh-100">
        <div class="container pt-3 pb-4">
            <header class="mb-4">
                <h1>{{ $title }}</h1>
            </header>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
                @foreach ($attributes as $attribute)
                    <div class="col">
                        <a href="{{ route('show.' . $slug, [$slug => $attribute->slug]) }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title fs-4 mb-0">
                                        {{ $attribute->name }}
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @can('is_admin')
                <a class="btn btn-primary mt-4" href="{{ route('create.' . $slug) }}">Create new</a>
            @endcan
        </div>
    </div>
@endsection