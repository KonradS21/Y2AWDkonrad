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
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Album list:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        @foreach($albums as $album)
                            <x-album-card
                                
                                :image="$album->image"
                                :title="$album->title"
                                :album="$album" 
                                /> 
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>