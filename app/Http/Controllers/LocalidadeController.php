<?php

namespace App\Http\Controllers;

use App\Models\Localidade;
use Illuminate\Http\Request;

class LocalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localidades = Localidade::withCount('contactos')->orderBy('localidade', 'asc')->get();
        return view('localidade.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('localidade.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'localidade' => 'required|string|max:255|unique:localidades,localidade',
        ], [
            'localidade.required' => 'O nome da localidade é obrigatório.',
            'localidade.unique' => 'Esta localidade já existe.',
        ]);

        Localidade::create($validated);

        return redirect()
            ->route('localidades.index')
            ->with('success', 'Localidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Localidade $localidade)
    {
        $localidade->load('contactos');
        return view('localidade.show', compact('localidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localidade $localidade)
    {
        return view('localidade.edit', compact('localidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Localidade $localidade)
    {
        $validated = $request->validate([
            'localidade' => 'required|string|max:255|unique:localidades,localidade,' . $localidade->id,
        ], [
            'localidade.required' => 'O nome da localidade é obrigatório.',
            'localidade.unique' => 'Esta localidade já existe.',
        ]);

        $localidade->update($validated);

        return redirect()
            ->route('localidades.index')
            ->with('success', 'Localidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localidade $localidade)
    {
        $localidade->delete();

        return redirect()
            ->route('localidades.index')
            ->with('success', 'Localidade excluída com sucesso!');
    }
}
