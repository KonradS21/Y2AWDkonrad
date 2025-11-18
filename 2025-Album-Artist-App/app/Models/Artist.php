<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['stage_name', 'birth_name', 'birth_date','biography','debut_year','image','no_of_grammys'];

    public function artist()
    {
        return $this->belongsToMany(Album::class);
    }
}
