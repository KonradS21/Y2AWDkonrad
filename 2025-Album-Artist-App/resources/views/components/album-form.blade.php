@props(['action', 'method', 'album'])
<!-- These are the form's settings (called "props"):
     - $action → the URL where the form sends the information
     - $method → the HTTP method (like POST, PUT, or PATCH)
-->

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <!-- This starts the form.
         - method="POST" is always used in HTML forms
         - enctype="multipart/form-data" allows file uploads (like album covers)
    -->


    @csrf
    <!-- This adds a hidden security token.
         Laravel needs this for all forms that change or save data
         to protect your site from attacks.
    -->

    @if($method === 'PUT' || $method === 'PATCH')
    @method($method)
    <!-- This adds another hidden input if the method is PUT or PATCH.
             HTML forms cannot send PUT or PATCH requests directly,
             so Laravel uses this hidden field to make it work.
             It adds something like:
             <input type="hidden" name="_method" value="PUT"> -->
    @endif
    <div class="mb-4">
        <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Album Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $album->title ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

   
    <div class="mb-4">
        <label for="release_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Release Date:</label>
        <input type="date" name="release_date" id="release_date"
            value="{{ old('release_date', isset($album->release_date) ? \Carbon\Carbon::parse($album->release_date)->format('Y-m-d') : '') }}"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

        @error('release_date')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="genre" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Genre:</label>
        <input type="text" name="genre" id="genre" value="{{ old('genre', $album->genre ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('genre')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Album Cover:</label>
        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('image')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="spotifyembed" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Spotify Embed Code:</label>
        <textarea name="spotifyembed" id="spotifyembed" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">{{ old('spotifyembed', $album->spotifyembed ?? '') }}</textarea>
        @error('spotifyembed')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div>

        <x-primary-button>

            {{ isset($album) ? 'Update Album' : 'Add Album' }}

        </x-primary-button>

    </div>

</form>