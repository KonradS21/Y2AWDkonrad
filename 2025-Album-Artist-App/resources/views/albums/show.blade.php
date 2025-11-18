<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Album Details') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-album-details 
                            :title="$album->title"
                            :image="asset('images/albums/' . $album->image)"
                        
                            :release_date="$album->release_date"
                            :genre="$album->genre"
                            :description="$album->description"
                            :spotifyembed="$album->spotifyembed"
                        />
                         
                <h4 class="text-lg font-semibold mt-6 mb-4">Tracklist:</h4>
                @if($album->songs->isEmpty())
                    <p>No songs available for this album.</p>
                @else
                
                    <ul class="mt-4 space-y-4">
                        @foreach($album->songs as $song)
                            <li class="bg-gray-100 p-4 rounded-lg">
                            <p class="font-xl">{{ $song->title }}</p>
                            <p class="text-sm text-gray-600">{{ $song->duration }}</p>
                            {!! html_entity_decode($song->spotifyembed) !!}
                        @if(auth()->user()->role === 'admin')    
                            <a href="{{ route('songs.edit', $song) }}" class="px-4 py-2 bg-blue-500  rounded hover:bg-blue-600">Edit song</a>
                            <div class="mt-4 flex space-x-2">
                        
                            <form action="{{ route('songs.destroy', $song) }}" method="POST"     onsubmit="return confirm('Are you sure you want to delete this album?');">
                             @csrf
                             @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 rounded hover:bg-red-600">Delete song</button>
                            </form>
                                </div>
                            </li>
                        @endif
                        @endforeach


                    </ul>
                   
                @endif
                @if(auth()->user()->role === 'admin')

                        <a href="{{ route('albums.edit', $album) }}" class="px-4 py-2 bg-blue-500  rounded hover:bg-blue-600">Edit album</a>
                        <div class="mt-4 flex space-x-2">
                        
                        <form action="{{ route('albums.destroy', $album) }}" method="POST"     onsubmit="return confirm('Are you sure you want to delete this album?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 rounded hover:bg-red-600">Delete album</button>
                        </form>
                        </div>

                        
                        
                    <h4 class="text-lg font-semibold mt-6 mb-4">Add New Song:</h4>
                    <form action="{{ route('songs.store', $album) }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Song Title:</label>
                            <input type="text" name="title" id="title" class="h1 w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="duration" class="block text-gray-700">Duration:</label>
                            <input type="text" name="duration" id="duration" class="w-full border border-gray-300 p-2 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="spotifyembed" class="block text-gray-700">Spotify Embed Code:</label>
                            <textarea name="spotifyembed" id="spotifyembed" class="w-full border border-gray-300 p-2 rounded" required></textarea>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Add Song</button>
                    </form>
                    </div>
                    </div>
                @endif
                </div>
                 
            </div>
        </div>
    </x-app-layout>
</div>
