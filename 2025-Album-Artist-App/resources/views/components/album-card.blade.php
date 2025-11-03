 @props(['image', 'title', 'album'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">

    
    <img src="{{asset('images/albums/' . $image)}}" alt="{{ $title }}" class="w-full"/>
    <h4 class="flex font-bold text-lg d-fl" style= "justify-content: center";>{{ $title }}</h4>
</div>