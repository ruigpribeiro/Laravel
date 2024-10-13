<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bands.create');
    }

   /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image',
    ]);

    $photoPath = null;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = str_replace('public/', '', $photoPath);
    }

    Band::create($validated);

    return redirect()->route('bands.index')->with('success', 'Banda criada com sucesso');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $band = Band::with('albums')->findOrFail($id);
        return view('bands.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image',
        ]);

        $band = Band::findOrFail($id);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public/photos');
        }

        $band->update($validated);

        return redirect()->route('bands.index')->with('success', 'Banda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $band = Band::findOrFail($id);
        $band->delete();

        return redirect()->route('bands.index')->with('success', 'Banda apagada com sucesso!');
    }

    /**
     * Show albums of a specific band.
     */
    public function showAlbums($bandId)
    {
        $band = Band::with('albums')->findOrFail($bandId);
        return view('albums.index', compact('band'));
    }
}
