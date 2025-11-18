<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use Carbon\Carbon;
use App\Models\Artist;

class AlbumSeeder extends Seeder{
    public function run(): void{
    $currentTimeStamp = Carbon::now();

    $albums = [
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
    ];

    foreach ($albums as $albumData)
        {
            $album = Album::create(array_merge($albumData, ['created_at'=>$currentTimeStamp, 'updated_at'=>$currentTimeStamp]));

            $artists = Artist::inRandomOrder()->take(2)->pluck('id');

            $album->artists()->attach($artists);
        }
}
}
