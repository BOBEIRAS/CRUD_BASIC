<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::withCount('contactos')->orderBy('grupo', 'asc')->get();
        return view('grupo.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupo.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grupo' => 'required|string|max:255|unique:grupos,grupo',
        ], [
            'grupo.required' => 'O nome do grupo é obrigatório.',
            'grupo.unique' => 'Este grupo já existe.',
        ]);

        Grupo::create($validated);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo criado com sucesso!');
    }

    public function edit(Grupo $grupo)
    {
        return view('grupo.edit', compact('grupo'));
    }

    public function update(Request $request, Grupo $grupo)
    {
        $validated = $request->validate([
            'grupo' => 'required|string|max:255|unique:grupos,grupo,' . $grupo->id,
        ], [
            'grupo.required' => 'O nome do grupo é obrigatório.',
            'grupo.unique' => 'Este grupo já existe.',
        ]);

        $grupo->update($validated);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo atualizado com sucesso!');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo excluído com sucesso!');
    }
}
