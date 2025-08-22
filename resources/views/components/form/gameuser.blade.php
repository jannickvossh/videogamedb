<form 
    method="POST" 
    action="{{ $edit ? route('update.games.user', ['game' => $game->id]) : route('store.games.user') }}" 
    class="mt-4 mb-4"
>
    @csrf
    @method($edit ? 'PATCH' : 'PUT')

    <input type="hidden" name="game_user_user_id" value="{{ $userId }}">
    <input type="hidden" name="game_user_game_id" value="{{ $game->id }}">

    <div class="mb-3 row">
        <div class="col">
            <span class="pe-3">
                <x-label for="game_user_owns_physically">Owns physically</x-label>
                <x-input.checkbox :name="'game_user_owns_physically'" value="1" :checked="$edit ? $gameUser->owns_physically : 0" />
            </span>

            <span class="pe-3">
                <x-label for="game_user_owns_digitally">Owns digitally</x-label>
                <x-input.checkbox :name="'game_user_owns_digitally'" value="1" :checked="$edit ? $gameUser->owns_digitally : 0" />
            </span>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col">
            <span class="pe-3">
                <x-label for="game_user_played">Played</x-label>
                <x-input.checkbox :name="'game_user_played'" value="1" :checked="$edit ? $gameUser->played : 0" />
            </span>

            <span class="pe-3">
                <x-label for="game_user_finished">Finished</x-label>
                <x-input.checkbox :name="'game_user_finished'" value="1" :checked="$edit ? $gameUser->finished : 0" />
            </span>

            <span class="pe-3">
                <x-label for="game_user_completed">Completed</x-label>
                <x-input.checkbox :name="'game_user_completed'" value="1" :checked="$edit ? $gameUser->completed : 0" />
            </span>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col">
            <x-label for="game_user_finished_on">Finished on</x-label>
            <x-input.date 
                :name="'game_user_finished_on'" 
                value="{{
                    $edit ? 
                        $gameUser->finished_on ? $gameUser->finished_on : null
                    :
                        ''
                }}" 
            />

            @error('game_user_finished_on')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <x-label for="game_user_completed_on">Completed on</x-label>
            <x-input.date 
                :name="'game_user_completed_on'" 
                value="{{
                    $edit ?
                        $gameUser->completed_on ? $gameUser->completed_on : null
                    :
                        ''
                }}" 
            />

            @error('game_user_completed_on')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <span class="pe-3">
                <x-label for="game_user_enjoyed">Enjoyed</x-label>
                <x-input.checkbox :name="'game_user_enjoyed'" value="1" :checked="$edit ? $gameUser->enjoyed : 0" />
            </span>

            <span>
                <x-label for="game_user_favorite">Favorite</x-label>
                <x-input.checkbox :name="'game_user_favorite'" value="1" :checked="$edit ? $gameUser->favorite : 0" />
            </span>
        </div>
    </div>

    @if ($edit)
        <button type="submit" class="btn btn-primary">Save</button>
    @else
        <button type="submit" class="btn btn-primary">Add</button>
    @endif
</form>
