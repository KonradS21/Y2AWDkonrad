<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use Carbon\Carbon;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::insert([
            [   
                'stage_name'=>'Ye',
                'birth_name'=>'Kanye Omari West',
                'birth_date'=> Carbon::parse('1977-06-08'),
                'biography'=>'Rapper, producer, genius',
                'debut_year'=>'2003',
                'image'=>'Ye.jpg',
                'no_of_grammys'=> '24'
            ],
            [   
                'stage_name'=>'Tyler, the Creator',
                'birth_name'=>'Tyler Gregory Okonma',
                'birth_date'=> Carbon::parse('1991-03-06'),
                'biography'=>'Rapper, producer, flamboyant man',
                'debut_year'=>'2007',
                'image'=>'ty.jpg',
                'no_of_grammys'=> '2'
            ],
            [   
                'stage_name'=>'Billy Joel',
                'birth_name'=>'William Martin Joel',
                'birth_date'=> Carbon::parse('1949-05-09'),
                'biography'=>'Singer, songwriter, THE piano man',
                'debut_year'=>'1971',
                'image'=>'billy.jpg',
                'no_of_grammys'=> '6'
            ]

        ]);
    }
}
