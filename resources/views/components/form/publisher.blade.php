<form 
    method="POST" 
    action="{{ $edit ? route('update.publisher', ['publisher' => $publisher->id]) : route('store.publisher') }}"
    class="mt-4 mb-4"
>
    @csrf
    @method($edit ? 'PATCH' : 'PUT')

    <div class="mb-3 row">
        <div class="col">
            <x-label for="publisher_name">Genre name</x-label>
            <x-input.text :name="'publisher_name'" value="{{ $edit ? $publisher->name : '' }}" />

            @error('publisher_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if ($edit)
                <button type="submit" class="btn btn-primary">Save publisher</button>
            @else
                <button type="submit" class="btn btn-primary">Create publisher</button>
            @endif
        </div>
    </div>
</form>