@extends ('layouts/main')

@section('title')
    <title>Register user</title>
@endsection

@section('content')
    <div class="container pt-3 pb-4">
        <header>
            <h1>Register a user</h1>
        </header>

        <form action="{{ route('store.user') }}" method="POST" class="mt-4 mb-4">
            @csrf
            @method('PUT')

            <legend>User info</legend>

            <div class="mb-3 row">
                <div class="col">
                    <x-label for="user_firstname">First name</x-label>
                    <x-input.text :name="'user_firstname'" />

                    @error('user_firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <x-label for="user_lastname">Last name</x-label>
                    <x-input.text :name="'user_lastname'" />

                    @error('user_lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col">
                    <x-label for="user_username">Username</x-label>
                    <x-input.text :name="'user_username'" />

                    @error('user_username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <x-label for="user_email">E-mail</x-label>
                    <x-input.email :name="'user_email'" />

                    @error('user_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col">
                    <x-label for="user_password">Password</x-label>
                    <x-input.password :name="'user_password'" />

                    @error('user_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
