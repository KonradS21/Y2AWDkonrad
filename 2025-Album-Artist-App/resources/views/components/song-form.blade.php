@props(['action', 'method', 'album', 'review'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    
    <div class="mb-4">
        <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Song Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $song->title ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="duration" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Song duration:</label>
        <input type="text" name="duration" id="duration" value="{{ old('duration', $song->duration ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('duration')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="spotifyembed" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Spotify Embed Code:</label>
        <textarea name="spotifyembed" id="spotifyembed" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">{{ old('spotifyembed', $song->spotifyembed ?? '') }}</textarea>
        @error('spotifyembed')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div>

        <x-primary-button>

            {{ isset($song) ? 'Update Song' : 'Add Song' }}

        </x-primary-button>

    </div>

</form>