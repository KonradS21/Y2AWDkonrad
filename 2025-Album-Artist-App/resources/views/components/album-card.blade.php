@props(['image', 'title'])

<div>
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white dark:bg-gray-800 m-4">
        <img class="w-full h-48 object-cover" src="{{ asset('images/albums/' . $image )}}" alt="{{ $title }}">
        <div class=" px-6 py-4">
            <div class="font-bold text-xl mb-2 text-gray-900 dark:text-gray-100">{{ $title }}</div>
        </div>
    </div>  
</div>

