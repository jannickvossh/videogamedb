<form 
    method="POST" 
    action="{{ $edit ? route('update.developer', ['developer' => $developer->id]) : route('store.developer') }}"
    class="mt-4 mb-4"
>
    @csrf
    @method($edit ? 'PATCH' : 'PUT')

    <div class="mb-3 row">
        <div class="col">
            <x-label for="developer_name">Developer name</x-label>
            <x-input.text :name="'developer_name'" value="{{ $edit ? $developer->name : '' }}" />

            @error('developer_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if ($edit)
                <button type="submit" class="btn btn-primary">Save developer</button>
            @else
                <button type="submit" class="btn btn-primary">Create developer</button>
            @endif
        </div>
    </div>
</form>