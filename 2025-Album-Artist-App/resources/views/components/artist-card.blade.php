<div>
     @props(['image', 'stage_name', 'artist'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">

    
    <img src="{{asset('images/artists/' . $image)}}" alt="{{ $stage_name }}" class="w-full"/>
    <h4 class="flex font-bold text-lg d-fl" style= "justify-content: center";>{{ $stage_name }}</h4>
</div>
</div>