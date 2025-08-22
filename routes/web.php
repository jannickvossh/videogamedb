<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\AttributesArchiveController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GameUserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;

Route::get('/', [FrontPageController::class, 'index'])->name('home');
Route::get('games', [GamesController::class, 'index'])->name('games');
Route::get('/archive/{attribute:slug}', [AttributesArchiveController::class, 'index'])->name('archive');

Route::prefix('platform')->group(function () {
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/create', [PlatformController::class, 'create'])->name('create.platform');
        Route::put('/store', [PlatformController::class, 'store'])->name('store.platform');
        Route::get('/edit/{platform:slug}', [PlatformController::class, 'edit'])->name('edit.platform');
        Route::patch('/update/{platform:id}', [PlatformController::class, 'update'])->name('update.platform');
        Route::delete('/delete/{platform:id}', [PlatformController::class, 'delete'])->name('delete.platform');
    });
    Route::get('/{platform:slug}', [PlatformController::class, 'show'])->name('show.platform');
});

Route::prefix('genre')->group(function () {
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/create', [GenreController::class, 'create'])->name('create.genre');
        Route::put('/store', [GenreController::class, 'store'])->name('store.genre');
        Route::get('/edit/{genre:slug}', [GenreController::class, 'edit'])->name('edit.genre');
        Route::patch('/update/{genre:id}', [GenreController::class, 'update'])->name('update.genre');
        Route::delete('/delete/{genre:id}', [GenreController::class, 'delete'])->name('delete.genre');
    });
    Route::get('/{genre:slug}', [GenreController::class, 'show'])->name('show.genre');
});

Route::prefix('developer')->group(function () {
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/create', [DeveloperController::class, 'create'])->name('create.developer');
        Route::put('/store', [DeveloperController::class, 'store'])->name('store.developer');
        Route::get('/edit/{developer:slug}', [DeveloperController::class, 'edit'])->name('edit.developer');
        Route::patch('/update/{developer:id}', [DeveloperController::class, 'update'])->name('update.developer');
        Route::delete('/delete/{developer:id}', [DeveloperController::class, 'delete'])->name('delete.developer');
    });
    Route::get('/{developer:slug}', [DeveloperController::class, 'show'])->name('show.developer');
});

Route::prefix('publisher')->group(function () {
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/create', [PublisherController::class, 'create'])->name('create.publisher');
        Route::put('/store', [PublisherController::class, 'store'])->name('store.publisher');
        Route::get('/edit/{publisher:slug}', [PublisherController::class, 'edit'])->name('edit.publisher');
        Route::patch('/update/{publisher:id}', [PublisherController::class, 'update'])->name('update.publisher');
        Route::delete('/delete/{publisher:id}', [PublisherController::class, 'delete'])->name('delete.publisher');
    });
    Route::get('/{publisher:slug}', [PublisherController::class, 'show'])->name('show.publisher');
});

Route::prefix('game')->group(function () {
    Route::get('/search', [GameController::class, 'search'])->name('search.game');
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/create', [GameController::class, 'create'])->name('create.game');
        Route::put('/store', [GameController::class, 'store'])->name('store.game');
        Route::get('/edit/{game:slug}', [GameController::class, 'edit'])->name('edit.game');
        Route::patch('/update/{game:id}', [GameController::class, 'update'])->name('update.game');
        Route::delete('/delete/{game:id}', [GameController::class, 'delete'])->name('delete.game');
    });
    Route::get('/{game:slug}', [GameController::class, 'show'])->name('show.game');
});

Route::prefix('user')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [UserController::class, 'create'])->name('register.user');
        Route::put('/store', [UserController::class, 'store'])->name('store.user');
    });
    Route::middleware([IsUser::class])->group(function () {
        Route::prefix('games')->group(function () {
            Route::get('/', [GameUserController::class, 'show'])->name('show.games.user');
            Route::get('/add/{game:slug}', [GameUserController::class, 'create'])->name('create.games.user');
            Route::put('/store', [GameUserController::class, 'store'])->name('store.games.user');
            Route::get('/edit/{game:slug}', [GameUserController::class, 'edit'])->name('edit.games.user');
            Route::patch('/update/{game:id}', [GameUserController::class, 'update'])->name('update.games.user');
            Route::delete('/delete/{game:id}', [GameUserController::class, 'delete'])->name('delete.games.user');
        });
    });
});

Route::prefix('session')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [SessionController::class, 'login'])->name('login.session');
        Route::post('/authenticate', [SessionController::class, 'authenticate'])->name('authenticate.session');
    });
    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [SessionController::class, 'logout'])->name('logout.session');
    });
});