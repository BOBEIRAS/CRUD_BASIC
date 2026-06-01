<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Localidade;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::with('localidade')
        ->orderBy('nome', 'asc')
        ->get()
        ->with('localidade', 'localidade->localidade');
        return view('contacto.index', compact('contactos'));
    }

    public function create()
    {
        $localidades = Localidade::orderBy('localidade', 'asc')->get();
        return view('contacto.create', compact('localidades'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'alcunha' => 'nullable|string|max:255',
        'telemovel' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:contactos,email',
        'localidade_id' => 'required|exists:localidades,id',
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

    Contacto::create($validated);

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
        $localidades = Localidade::orderBy('localidade', 'asc')->get();
        return view('contacto.edit', compact('contacto', 'localidades'));
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
        ]);

        $contacto->update($validated);

        return redirect()->route('contactos.index')->with('success', 'Contacto atualizado com sucesso!');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return redirect()->route('contactos.index')->with('success', 'Contacto excluído com sucesso!');
    }
}
