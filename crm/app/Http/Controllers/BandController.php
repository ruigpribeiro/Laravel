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
    // Validar o pedido
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image',
    ]);

    // Inicializa a variável da foto
    $photoPath = null;

    // Verifica se há upload da foto
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = str_replace('public/', '', $photoPath);
    }

    // Cria a banda na base de dados, incluindo o caminho da imagem
    Band::create($validated);

    // Redireciona para o index das bandas com uma mensagem de sucesso
    return redirect()->route('bands.index')->with('success', 'Banda criada com sucesso');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontra a banda com o devido id e retorna a view
        $band = Band::with('albums')->findOrFail($id);
        return view('bands.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontra a banda com o devido id e retorna a view
        $band = Band::findOrFail($id);
        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valida o pedido
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image',
        ]);

        // Encontra a banda
        $band = Band::findOrFail($id);

        // Se der upload da foto, insere na base de dados
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public/photos');
        }

        // Atualiza a banda com as devidas alterações
        $band->update($validated);

        // Redireciona para as bandas com uma mensagem
        return redirect()->route('bands.index')->with('success', 'Banda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontra a banda com o devido id e apaga-a
        $band = Band::findOrFail($id);
        $band->delete();

        // Redireciona para o index das bandas com uma mensagem
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
