<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        // 'artist',
        'release_date',
        'genre',
        'image',
        'spotifyembed',
        'created_at',
        'updated_at'
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
