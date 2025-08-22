<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\Genre;
use App\Models\Game;
use App\Models\User;
use App\Models\Role;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\GameGenre;
use App\Models\DeveloperGame;
use App\Models\GamePublisher;
use App\Models\GamePlatform;
use App\Models\GameUser;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* 
            Role
        */

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'user']);

        /* 
            User
        */

        User::factory()->create([
            'firstname' => 'User',
            'lastname' => 'User',
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => 'Abcd1234#'
        ]);

        User::factory()->create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'Abcd1234#'
        ]);

        /* 
            Platform
        */

        $platformNames = [
            'Android',
            'GameBoy Advance',
            'GameBoy Color',
            'GameBoy',
            'iOS',
            'Linux',
            'Mac',
            'Nintendo 3DS',
            'Nintendo DS',
            'Nintendo Switch 2',
            'Nintendo Switch',
            'PC (Microsoft Windows)',
            'PlayStation 2',
            'PlayStation 3',
            'PlayStation 4',
            'PlayStation 5',
            'PlayStation',
            'PlayStation Portable',
            'PlayStation Vita',
            'Wii U',
            'Wii',
            'Xbox One',
            'Xbox Series X|S',
            'Super Famicom',
            'Super Nintendo Entertainment System',
            'Google Stadia'
        ];

        foreach ($platformNames as $platformName) :
            Platform::factory()->create([
                'name'          => $platformName,
                'slug'          => Str::slug($platformName)
            ]);
        endforeach;

        /* 
            Genre
        */

        $genreNames = [
            'Adventure',
            'Arcade',
            'Card & Board Game',
            'Fighting',
            'Hack and slash/Beat \'em up',
            'Indie',
            'MOBA',
            'Music',
            'Platform',
            'Point-and-click',
            'Puzzle',
            'Quiz/Trivia',
            'Racing',
            'Real Time Strategy (RTS)',
            'Role-playing (RPG)',
            'Shooter',
            'Simulator',
            'Sport',
            'Strategy',
            'Tactical',
            'Turn-based strategy (TBS)',
            'Visual Novel',
            'Pinball'
        ];

        foreach ($genreNames as $genreName) :
            Genre::factory()->create([
                'name'          => $genreName,
                'slug'          => Str::slug($genreName)
            ]);
        endforeach;

        /* 
            Developer
        */

        $developerNames = [
            'ConcernedApe',
            'Nintendo',
            'Nintendo EPD',
            'Team Asobi',
            'Nintendo EPD Production Group No. 8',
            'Rare',
            'Sucker Punch Productions',
            'Extremely OK Games',
            'Insomniac Games'
        ];
        sort($developerNames);


        foreach ($developerNames as $developerName) :
            Developer::factory()->create([
                'name'          => $developerName,
                'slug'          => Str::slug($developerName)
            ]);
        endforeach;

        /* 
            Publisher
        */

        $publisherNames = [
            'ConcernedApe',
            'Chucklefish Games',
            'Nintendo',
            'Sony Interactive Entertainment',
            'Gradiente',
            'Playtronic',
            'Hyundai',
            'Maddy Makes Games'
        ];
        sort($publisherNames);


        foreach ($publisherNames as $publisherName) :
            Publisher::factory()->create([
                'name'          => $publisherName,
                'slug'          => Str::slug($publisherName)
            ]);
        endforeach;

        /* 
            Game
        */

        $games = [
            [
                'title'         => 'Stardew Valley',
                'release_date'  => '2016-02-26'
            ],
            [
                'title'         => 'Super Mario Maker 2',
                'release_date'  => '2019-06-28'
            ]
        ];

        foreach ($games as $game) :
            Game::factory()->create([
                'title'         => $game['title'],
                'slug'          => Str::slug($game['title']),
                'release_date'  => $game['release_date']
            ]);
        endforeach;

        /* 
            GameGenre
        */

        GameGenre::factory()->create([
            'game_id'           => 1,
            'genre_id'          => 1
        ]);

        GameGenre::factory()->create([
            'game_id'           => 1,
            'genre_id'          => 6
        ]);

        GameGenre::factory()->create([
            'game_id'           => 1,
            'genre_id'          => 15
        ]);

        GameGenre::factory()->create([
            'game_id'           => 1,
            'genre_id'          => 17
        ]);

        GameGenre::factory()->create([
            'game_id'           => 1,
            'genre_id'          => 19
        ]);

        GameGenre::factory()->create([
            'game_id'           => 2,
            'genre_id'          => 9
        ]);

        /* 
            DeveloperGame
        */

        DeveloperGame::factory()->create([
            'developer_id'      => 1,
            'game_id'           => 1
        ]);

        DeveloperGame::factory()->create([
            'developer_id'      => 2,
            'game_id'           => 2
        ]);

        DeveloperGame::factory()->create([
            'developer_id'      => 3,
            'game_id'           => 2
        ]);

        /* 
            GamePublisher
        */

        GamePublisher::factory()->create([
            'game_id'           => 1,
            'publisher_id'      => 1
        ]);

        GamePublisher::factory()->create([
            'game_id'           => 1,
            'publisher_id'      => 2
        ]);

        GamePublisher::factory()->create([
            'game_id'           => 2,
            'publisher_id'      => 3
        ]);

        /* 
            GamePlatform
        */

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 1
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 5
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 6
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 7
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 11
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 12
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 15
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 19
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 20
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 1,
            'platform_id'       => 22
        ]);

        GamePlatform::factory()->create([
            'game_id'           => 2,
            'platform_id'       => 11
        ]);

        /* 
            GameUser
        */

        GameUser::factory()->create([
            'user_id'           => 1,
            'game_id'           => 2,
            'enjoyed'           => 1,
            'favorite'          => 1,
            'played'            => 1,
            'owns_physically'   => 1,
            'owns_digitally'    => 0,
            'finished'          => 1,
            'completed'         => 0,
            'finished_on'       => '2021-10-27'
        ]);
    }
}
