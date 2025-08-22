<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_publisher');
    }
    //
}
