<form 
    method="POST" 
    action="{{ $edit ? route('update.genre', ['genre' => $genre->id]) : route('store.genre') }}"
    class="mt-4 mb-4"
>
    @csrf
    @method($edit ? 'PATCH' : 'PUT')

    <div class="mb-3 row">
        <div class="col">
            <x-label for="genre_name">Genre name</x-label>
            <x-input.text :name="'genre_name'" value="{{ $edit ? $genre->name : '' }}" />

            @error('genre_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if ($edit)
                <button type="submit" class="btn btn-primary">Save genre</button>
            @else
                <button type="submit" class="btn btn-primary">Create genre</button>
            @endif
        </div>
    </div>
</form>