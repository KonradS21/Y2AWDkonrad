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
                            :artist="$album->artist"
                            :release_date="$album->release_date"
                            :genre="$album->genre"
                            :description="$album->description"
                        />
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
