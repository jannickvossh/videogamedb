@extends ('layouts/main')

@section ('title')
    <title>{{ $genre->name }} - My Video Game DB</title>
@endsection

@section ('content')
    <div class="min-vh-100">
        <div class="container pt-3 pb-4">
            <header class="mb-4">
                <h1>Games in {{ $genre->name }}</h1>
            </header>
            
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($genre->games as $game)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <a href="{{ route('show.game', ['game' => $game]) }}">
                                        {{ $game->title }}
                                    </a>
                                </h2>
                                <p><strong>Released on</strong> {{ $game->release_date }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @can('is_admin')
            <div class="container pt-4 pb-4">
                <div class="btn-group" role="group">
                    <a class="btn btn-primary" href="{{ route('edit.genre', ['genre' => $genre->slug]) }}">Edit genre</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete genre</button>
                </div>
            </div>

            <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="confirmDeleteLabel">Delete genre</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>This action cannot be undone!</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('delete.genre', ['genre' => $genre->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Noooo</button>
                                <button type="submit" class="btn btn-primary">Yes, delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection