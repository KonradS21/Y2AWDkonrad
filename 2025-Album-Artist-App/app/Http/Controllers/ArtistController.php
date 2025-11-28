<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Composer\Package\CompletePackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::with('albums')->get();
        return view("artists.index", compact("artists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       if (auth()->user()->role !== 'admin') {
            return redirect()->route('artists.index')->with('error', 'Unauthorized access.');
        }

        $albums = Album::all();
        return view('artists.create', compact('albums'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $artist = $request->artist_id;

       
         $request->validate([
            'stage_name' => 'required|string|max:55',
            'birth_name' => 'required|string|max:55',
            'birth_date' => 'required|date',
            'biography' => 'required|string|max:670',
            'debut_year' => 'required|int|max:3000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_of_grammys' => 'required|int|max:100',
        ]);
        if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        // $imageName = time().'.'.$request->image->extension();  
           $request->image->move(public_path('images/artists'), $imageName);
       }
       Artist::create([
            'stage_name' => $request->stage_name,
            'birth_name' => $request->birth_name,
            'birth_date' => $request->birth_date,
            'biography' => $request->biography,
            'debut_year' => $request->debut_year,
            'image' => $imageName,
            'no_of_grammys' => $request->no_of_grammys,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('artists.index')->with('success', 'artist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit')->with('artist', $artist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'stage_name' => 'required|string|max:55',
            'birth_name' => 'required|string|max:55',
            'birth_date' => 'required|date',
            'biography' => 'required|string|max:670',
            'debut_year' => 'required|int|max:3000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_of_grammys' => 'required|int|max:100',
        ]);
        if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        // $imageName = time().'.'.$request->image->extension();  
           $request->image->move(public_path('images/artists'), $imageName);
        }
        $artist->update([
            'stage_name' => $request->stage_name,
            'birth_name' => $request->birth_name,
            'birth_date' => $request->birth_date,
            'biography' => $request->biography,
            'debut_year' => $request->debut_year,
            'image' => $imageName,
            'no_of_grammys' => $request->no_of_grammys,
            'updated_at' => now()
        ]);
        return to_route('artists.index')->with('success', 'artist updated successfully.');
    }    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
       $artist->delete();
        return to_route('artists.index')->with('success', 'artist deleted successfully.');
    }
}
