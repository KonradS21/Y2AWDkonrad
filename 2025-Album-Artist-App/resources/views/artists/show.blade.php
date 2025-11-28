

<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Artist Details') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-artist-details 
                            :stage_name="$artist->stage_name"
                            :image="asset('images/artists/' . $artist->image)"
                            :birth_name="$artist->birth_name"
                            :birth_date="$artist->birth_date"
                            :debut_year="$artist->debut_year"
                            :biography="$artist->biography"
                            :no_of_grammys="$artist->no_of_grammys"
                            />

                        @if($artist->albums->isEmpty())
                        <p>nothing here</p>  
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                              @foreach($artist->albums as $album)
                              <a href="{{ route('albums.show', $album) }}">
                                    <x-album-card 
                                        :image="$album->image"
                                        :title="$album->title"
                                        :album="$album"

                                    />
                                </a>
                            
                               @endforeach
                            </div>
                        @endif

                
                @if(auth()->user()->role === 'admin')

                        <a href="{{ route('artists.edit', $artist) }}" class="px-4 py-2 bg-blue-500  rounded hover:bg-blue-600">Edit artist</a>
                        <div class="mt-4 flex space-x-2">
                        
                        <form action="{{ route('artists.destroy', $artist) }}" method="POST"     onsubmit="return confirm('Are you sure you want to delete this artist?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 rounded hover:bg-red-600">Delete artist</button>
                        </form>
                        </div>

                        
                    
                    </div>
                    </div>
                @endif
                </div>
                 
            </div>
        </div>
    </x-app-layout>
