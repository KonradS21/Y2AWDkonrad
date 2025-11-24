<?php

namespace Database\Seeders;
use App\Models\Album;

use App\Models\Artist;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([AlbumSeeder::class, ArtistSeeder::class]);
        // User::factory(10)->create();
        
        $artist = Artist::all();
        $album = Album::all();

        foreach ($album as $album) {
            $album->artists()->attach($artist->random()->id);
       // User::factory()->create([
       //     'name' => 'Test User',
       //     'email' => 'test@example.com',
       // ]);
        }
    }
}
