@extends ('layouts/main')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <div class="container pt-3 pb-4">
        <header>
            <h1>Login</h1>
        </header>

        <form action="{{ route('authenticate.session') }}" method="POST" class="mt-4 mb-4">
            @csrf

            <legend>User info</legend>

            <div class="mb-3 row">
                <div class="col">
                    <x-label for="user_username">Username</x-label>
                    <x-input.text :name="'user_username'" />

                    @error('user_username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <x-label for="user_password">Password</x-label>
                    <x-input.password :name="'user_password'" />

                    @error('user_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection