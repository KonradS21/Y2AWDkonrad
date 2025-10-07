<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Albums') }}
        </h2>
    </x-slot>
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">Album List</h3>
                    @foreach($albums as $album)
                    
                    <a href="{{ route('albums.show', $album)}}">
                        <x-album-card 
                        :title="$album->title"
                        :image="$album->image"
                        />
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>