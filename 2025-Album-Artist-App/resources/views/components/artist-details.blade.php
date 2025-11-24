@props(['stage_name', 'birth_name', 'birth_date', 'biography', 'debut_year', 'image', 'no_of_grammys'])

<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="flex flex-col md:flex-row">
        <!-- Album cover -->
        <div class="md:w-1/3">
            <img src="{{ $image }}" alt="{{ $stage_name }} cover" class="w-full h-full object-cover">
        </div>

        <!-- Album info -->
        <div class="p-6 md:w-2/3">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $stage_name }}</h2>

          

            <p class="text-gray-600 mb-1">
                <span class="font-semibold">Birth name:</span> {{ $birth_name }}
            </p>

            <p class="text-gray-600 mb-4">
                <span class="font-semibold">Date of Birth:</span> {{ $birth_date }}
            </p>
            <p class="text-gray-600 mb-4">
                <span class="font-semibold">Year of debut:</span> {{ $debut_year }}
            </p>
            <p class="text-gray-600 mb-4">
                <span class="font-semibold">Grammys Won:</span> {{ $no_of_grammys }}
            </p>

            <p class="text-gray-700 leading-relaxed">{{ $biography }}</p>


            
        </div>
    </div>
</div>