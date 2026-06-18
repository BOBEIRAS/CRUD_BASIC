<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Localidade;
use App\Models\Grupo;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $grupos= Grupo::where('grupo','like','%'.$search.'%')
        ->orderBy('grupo','asc')
        ->with('contactos')
        ->get();
        
        $contactos = Contacto::with('localidade')->orderBy('nome', 'asc')->get();
        return view('contacto.index', compact('grupos','contactos'));
    }

    public function create()
    {
        $localidades = Localidade::orderBy('localidade', 'asc')->get();
        $grupos = Grupo::orderBy('grupo', 'asc')->get();
        return view('contacto.create', compact('localidades', 'grupos'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'alcunha' => 'nullable|string|max:255',
        'telemovel' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:contactos,email',
        'localidade_id' => 'required|exists:localidades,id',
        'grupos' => 'nullable|array',
        'grupos.*' => 'exists:grupos,id',
        'observacoes' => 'nullable|string',
    ], [
        'nome.required' => 'O nome é obrigatório.',
        'telemovel.required' => 'O número de telemóvel é obrigatório.',
        'email.required' => 'O email é obrigatório.',
        'email.email' => 'Insere um email válido.',
        'email.unique' => 'Este email já existe.',
        'localidade_id.required' => 'A localidade é obrigatória.',
        'localidade_id.exists' => 'A localidade selecionada é inválida.',
    ]);

    $contacto = Contacto::create($validated);
    $contacto->grupos()->sync($validated['grupos'] ?? []);

    return redirect()
        ->route('contactos.index')
        ->with('success', 'Contacto criado com sucesso!');
}


    public function show(Contacto $contacto)
    {
        return view('contacto.show', compact('contacto'));
    }


    public function edit(Contacto $contacto)
    {
        $grupos = Grupo::orderBy('grupo', 'asc')->get();
        $localidades = Localidade::orderBy('localidade', 'asc')->get();
        return view('contacto.edit', compact('contacto', 'localidades', 'grupos'));
    }


    public function update(Request $request, Contacto $contacto)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'alcunha' => 'nullable|string|max:255',
            'telemovel' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:contactos,email,' . $contacto->id,
            'localidade_id' => 'required|exists:localidades,id',
            'observacoes' => 'nullable|string',
            'grupos' => 'nullable|array',
            'grupos.*' => 'exists:grupos,id',
        ], [
        'grupos.exists' => 'O grupo selecionado é inválido.',
    ]);

        $contacto->update($validated);
        $contacto->grupos()->sync($validated['grupos'] ?? []);

        return redirect()->route('contactos.index')->with('success', 'Contacto atualizado com sucesso!');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->grupos()->sync([]);
        $contacto->delete();

        return redirect()->route('contactos.index')->with('success', 'Contacto excluído com sucesso!');
    }
}
