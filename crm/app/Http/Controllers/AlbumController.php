<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($bandId)
    {
        // Encontra os albuns e retorna a view com os albuns
        $band = Band::with('albums')->findOrFail($bandId);
        return view('albums.index', compact('band'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($bandId)
    {
        // Encontra a banda e retorna a view para criar um album
        $band = Band::findOrFail($bandId);
        return view('albums.create', compact('band'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $bandId)
    {
        // Validar o pedido
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|image',
        ]);

        // Se der upload de uma foto, guarda na base de dados
        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('albums', 'public');
            $validated['image'] = str_replace('public/', '', $photoPath);
        }

        // Adiciona o band_id à validação
        $validated['band_id'] = $bandId;

        // Cria o album na base de dados
        Album::create($validated);

        // Redireciona de volta para a lista de albuns da banda com uma mensagem
        return redirect()->route('bands.albums', $bandId)->with('success', 'Álbum criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show($bandId, $albumId)
    {
        // Encontra o album com a devida banda e retorna a view
        $album = Album::where('band_id', $bandId)->findOrFail($albumId);
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bandId, $albumId)
    {
        $album = Album::where('band_id', $bandId)->findOrFail($albumId);
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bandId, $albumId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|image',
        ]);

        $album = Album::where('band_id', $bandId)->findOrFail($albumId);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public/albums');
        }

        $album->update($validated);

        return redirect()->route('bands.albums', $bandId)->with('success', 'Álbum atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bandId, $albumId)
    {
        $album = Album::where('band_id', $bandId)->findOrFail($albumId);
        $album->delete();

        return redirect()->route('bands.albums', $bandId)->with('success', 'Álbum apagado com sucesso!');
    }
}
