@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
    {{ $slot }}
</div>
@endif