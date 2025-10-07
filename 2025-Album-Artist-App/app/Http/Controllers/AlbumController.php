<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        // $imageName = time().'.'.$request->image->extension();  
           $request->image->move(public_path('images/albums'), $imageName);
       }

        Album::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('albums.index')->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('albums.show')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit')->with('album', $album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         // Check if a new image was uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/albums'), $imageName);

        // Optionally delete old image
        if ($album->image && file_exists(public_path('images/albums/' . $album->image))) {
            unlink(public_path('images/albums/' . $album->image));
        }
    } else {
        // Keep existing image
        $imageName = $album->image;
    }
        $album->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'image' => $imageName,
            'updated_at' => now()
        ]);

        return to_route('albums.index')->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return to_route('albums.index')->with('success', 'Album deleted successfully.');
    }
}
