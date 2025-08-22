<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'developer_game');
    }
}
