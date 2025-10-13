@props(['image', 'title', 'album'])

<a href="{{ route('albums.show', $album)}}" class="w-full h-full bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
    <!-- Image -->
    <div class="flex-1">
        <img src="{{ asset('images/albums/' . $image )}}" alt="{{ $title }}" class="object-cover">
    </div>

    <!-- Title -->
    <div class="p-4 flex items-center justify-center h-full">
        <h3 class="text-lg font-semibold text-center text-gray-900 dark:text-gray-100">
        {{ $title }}
        </h3>
    </div>
</a>


