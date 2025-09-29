<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlbumSeeder extends Seeder{
    public function run(): void{
    $currentTimeStamp = Carbon::now();

    Album::insert([
        [
            'title' => 'The College Dropout',
            'release_date' => Carbon::parse('2004-02-10'),
            'genre' => 'Hip-Hop',
            'image' => 'TCD.jpg',
            'created_at' => $currentTimeStamp,
            'updated_at' => $currentTimeStamp,
        ],
        [
            'title' => 'Late Registration',
            'release_date' => Carbon::parse('2005-08-30'),
            'genre' => 'Hip-Hop',
            'image' => 'LR.jpg',
            'created_at' => $currentTimeStamp,
            'updated_at' => $currentTimeStamp,
        ],
        [
            'title' => 'Graduation',
            'release_date' => Carbon::parse('2007-09-11'),
            'genre' => 'Hip-Hop',
            'image' => 'GRAD.jpg',
            'created_at' => $currentTimeStamp,
            'updated_at' => $currentTimeStamp,
        ],
    ]);

    

    }
}
