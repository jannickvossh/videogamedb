<form 
    enctype="multipart/form-data" 
    method="POST" 
    action="{{ $edit ? route('update.game', ['game' => $game->id]) : route('store.game') }}" 
    class="mt-4 mb-4"
>
    @csrf
    @method($edit ? 'PATCH' : 'PUT')

    <legend>Game info</legend>

    <div class="mb-3 row">
        <div class="col">
            <x-label for="game_title">Game title</x-label>
            <x-input.text :name="'game_title'" value="{{ $edit ? $game->title : '' }}" />

            @error('game_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <x-label for="game_image">Game image</x-label>
            <x-input.file :name="'game_image'" />
            @if ($edit && $game->image)
                <img src="{{ URL::asset('/game_images/' . $game->image) }}" alt=""
                    class="game__image game__image--thumbnail">
            @endif

            @error('game_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <x-label for="game_release_date">Initial release date</x-label>
            <x-input.date :name="'game_release_date'" value="{{ $edit ? $game->release_date : '' }}" />

            @error('game_release_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col">
            <x-label for="game_platforms">Select platforms</x-label>
            <x-select :name="'game_platforms'" :multiple="true">
                @php
                    if ($edit) :
                        $platformsArray = pivotDataFromGame($games_platforms, $game, 'platform_id');
                    endif;
                @endphp
                @foreach ($platforms as $platform)
                    <option 
                        value="{{ $platform->id }}"
                        {{
                            $edit ?
                                in_array($platform->id, $platformsArray) ? 'selected' : ''
                            :
                                ''
                        }}
                    >
                        {{ $platform->name }}
                    </option>
                @endforeach
            </x-select>

            @error('game_platforms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <x-label for="game_genres">Select genres</x-label>
            <x-select :name="'game_genres'" :multiple="true">
                @php
                    if ($edit) :
                        $genresArray = pivotDataFromGame($games_genres, $game, 'genre_id');
                    endif;
                @endphp
                @foreach ($genres as $genre)
                    <option 
                        value="{{ $genre->id }}" 
                        {{
                            $edit ?
                                in_array($genre->id, $genresArray) ? 'selected' : ''
                            :
                                '' 
                        }}
                    >
                        {{ $genre->name }}
                    </option>
                @endforeach
            </x-select>


            @error('game_genres')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <x-label for="game_developers">Select developers</x-label>
            <x-select :name="'game_developers'" :multiple="true">
                @php
                    if ($edit) :
                        $developersArray = pivotDataFromGame($developers_games, $game, 'developer_id');
                    endif;
                @endphp
                @foreach ($developers as $developer)
                    <option 
                        value="{{ $developer->id }}"
                        {{
                            $edit ?
                                in_array($developer->id, $developersArray) ? 'selected' : ''
                            :
                                '' 
                        }}
                    >
                        {{ $developer->name }}
                    </option>
                @endforeach
            </x-select>

            @error('game_developers')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <x-label for="game_publishers">Select publishers</x-label>
            <x-select :name="'game_publishers'" :multiple="true">
                @php
                    if ($edit) :
                        $publishersArray = pivotDataFromGame($games_publishers, $game, 'publisher_id');
                    endif;
                @endphp
                @foreach ($publishers as $publisher)
                    <option 
                        value="{{ $publisher->id }}"
                        {{
                            $edit ?
                                in_array($publisher->id, $publishersArray) ? 'selected' : ''
                            :
                                ''
                        }}
                    >
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </x-select>

            @error('game_publishers')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    @if ($edit)
        <button type="submit" class="btn btn-primary">Save</button>
    @else
        <button type="submit" class="btn btn-primary">Create game</button>
    @endif
</form>
