<form 
    method="POST" 
    action="{{ $edit ? route('update.platform', ['platform' => $platform->id]) : route('store.platform') }}"
    class="mt-4 mb-4"
>
    @csrf
    @method($edit ? 'PATCH' : 'PUT')

    <div class="mb-3 row">
        <div class="col">
            <x-label for="platform_name">Platform name</x-label>
            <x-input.text :name="'platform_name'" value="{{ $edit ? $platform->name : '' }}" />

            @error('platform_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if ($edit)
                <button type="submit" class="btn btn-primary">Save platform</button>
            @else
                <button type="submit" class="btn btn-primary">Create platform</button>
            @endif
        </div>
    </div>
</form>