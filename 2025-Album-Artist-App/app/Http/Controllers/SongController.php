<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Album $album)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'spotifyembed' => 'nullable|string',
        ]);

        Song::create([
            'album_id' => $album->id,
            'user_id' => auth()->id(), 
            'title' => $request->title,
            'duration' => $request->duration,
            'spotifyembed' => $request->input('spotifyembed', ''),
           
    ]);
        return redirect()->route('albums.show', $album)->with('success', 'Song added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
