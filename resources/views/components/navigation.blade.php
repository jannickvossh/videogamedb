<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <x-site-logo class="text-light"></x-site-logo>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 w-100">
                <li class="nav-item">
                    <x-nav-link 
                        :active="Route::currentRouteName() === 'home'" 
                        href="{{ route('home') }}" 
                        class="text-light"
                    >
                        Home
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link 
                        :active="Route::currentRouteName() === 'games'" 
                        href="{{ route('games') }}" 
                        class="text-light"
                    >
                        Games
                    </x-nav-link>
                </li>
                @auth
                    <li class="nav-item ms-auto">
                        @auth
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->username }}
                                </button>
                                <ul class="dropdown-menu">
                                    @can('is_admin')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('create.game') }}">Create game</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('create.platform') }}">Create platform</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('create.genre') }}">Create genre</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('create.developer') }}">Create developer</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('create.publisher') }}">Create publisher</a>
                                        </li>
                                    @endcan

                                    @can('is_user')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('show.games.user') }}">My games</a>
                                        </li>
                                    @endcan

                                    <form method="POST" action="{{ route('logout.session') }}" class="mt-2 dropdown-item bg-transparent">
                                        @csrf

                                        <button type="submit" class="btn btn-danger w-100">Log out</button>
                                    </form>
                                </ul>
                            </div>
                        @endauth
                    </li>
                @else
                    <li class="nav-item ms-auto">
                        <x-nav-link 
                            :active="Route::currentRouteName() === 'register.user'" 
                            href="{{ route('register.user') }}" 
                            class="text-light"
                        >
                            Register
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link 
                            :active="Route::currentRouteName() === 'login.user'" 
                            href="{{ route('login.session') }}" 
                            class="text-light"
                        >
                            Log in
                        </x-nav-link>
                    </li>
                @endauth
            </ul>

            <form action="{{ route('search.game') }}" method="GET" class="d-flex ms-2" role="search">
                @csrf

                <x-input.search 
                    :name="'search_games'"  
                    placeholder="Search games" 
                    aria-label="Search" 
                    class="nav-search__input" 
                />
                <button class="btn btn-primary nav-search__submit" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
