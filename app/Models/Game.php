<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'release_date',
        'enjoyed',
        'finished_on',
        'completed_on',
        'favorite'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_game');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'game_publisher');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'game_user');
    }
}
