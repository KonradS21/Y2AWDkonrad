@props(['action', 'method', 'artist'])
<!-- These are the form's settings (called "props"):
     - $action → the URL where the form sends the information
     - $method → the HTTP method (like POST, PUT, or PATCH)
-->

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <!-- This starts the form.
         - method="POST" is always used in HTML forms
         - enctype="multipart/form-data" allows file uploads (like artist covers)
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
        <label for="stage_name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Stage Name:</label>
        <input type="text" name="stage_name" id="stage_name" value="{{ old('stage_name', $artist->stage_name ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('stage_name')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="birth_name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Birth Name:</label>
        <input type="text" name="birth_name" id="birth_name" value="{{ old('birth_name', $artist->birth_name ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('birth_name')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
   
    <div class="mb-4">
        <label for="birth_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Birth Date:</label>
        <input type="date" name="birth_date" id="birth_date"
            value="{{ old('birth_date', isset($artist->birth_date) ? \Carbon\Carbon::parse($artist->birth_date)->format('Y-m-d') : '') }}"
            required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

        @error('birth_date')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="biography" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Biography:</label>
        <input type="text" name="biography" id="biography" value="{{ old('biography', $artist->biography ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('biography')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="debut_year" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Debut Year:</label>
        <input type="int" name="debut_year" id="debut_year" value="{{ old('debut_year', $artist->debut_year ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('debut_year')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">artist Cover:</label>
        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('image')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="no_of_grammys" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Number of Grammys:</label>
        <input type="int" name="no_of_grammys" id="no_of_grammys" value="{{ old('no_of_grammys', $artist->no_of_grammys ?? '') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
        @error('no_of_grammys')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    
    <div>

        <x-primary-button>

            {{ isset($artist) ? 'Update Artist' : 'Add Artist' }}

        </x-primary-button>

    </div>

</form>