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

        $album = $request->album_id;

        // dd($album);
         $request->validate([
             'album_id' => 'required',
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'spotifyembed' => 'nullable|string',
        ]);
        $duration = $request->duration;
        if (strpos($duration, ':') !== false) {
            list($minutes, $seconds) = explode(':', $duration);
            $duration = ($minutes * 60) + $seconds;
        }

        Song::create([
            'album_id' => $request->album_id,
            'user_id' => auth()->id(), 
            'title' => $request->title,
            'duration' => $request->duration,
            'spotifyembed' => $request->input('spotifyembed', ''),
            'image' => null, // since we made it nullable
           
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
       //dd($song);
        
        // if (auth()->user()->id !== $song->user_id && auth()->user()->role !== 'admin') {
        //     return redirect()->route('songs.index', $song->id)->with('error', 'Acccecss denied.');
        // }

        return view('songs.edit', compact('song'));       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $song->update($request->all());

        return redirect()->route('albums.show', $song->album_id)->with('success','update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('albums.show', $song->album_id)->with('success','');
    }
}
