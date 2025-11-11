@props(['title', 'image', 'artist', 'release_date', 'genre', 'description', 'spotifyembed'])

<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="flex flex-col md:flex-row">
        <!-- Album cover -->
        <div class="md:w-1/3">
            <img src="{{ $image }}" alt="{{ $title }} cover" class="w-full h-full object-cover">
        </div>

        <!-- Album info -->
        <div class="p-6 md:w-2/3">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $title }}</h2>

          

            <p class="text-gray-600 mb-1">
                <span class="font-semibold">Released:</span> {{ $release_date }}
            </p>

            <p class="text-gray-600 mb-4">
                <span class="font-semibold">Genre:</span> {{ $genre }}
            </p>

            <p class="text-gray-700 leading-relaxed">{{ $description }}</p>


            
            {!! html_entity_decode($spotifyembed) !!}
        </div>
    </div>
</div>


<!-- <iframe data-testid="embed-iframe" style="border-radius:12px" src="https://open.spotify.com/embed/album/0U28P0QVB1QRxpqp5IHOlH?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe> -->