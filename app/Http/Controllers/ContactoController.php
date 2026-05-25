<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::orderBy('nome', 'asc')->get();
        return view('contacto.index', compact('contactos'));
    }

    public function create()
    {
        return view('contacto.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'alcunha' => 'nullable|string|max:255',
            'telemovel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'localidade' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        Contacto::create($validated);

        return redirect()->route('contactos.index')->with('success', 'Contacto criado com sucesso!');
    }


    public function show(string $id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contacto.show', compact('contacto'));
    }


    public function edit(string $id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contacto.edit', compact('contacto'));
    }


    public function update(Request $request, string $id)
    {
        $contacto = Contacto::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'alcunha' => 'nullable|string|max:255',
            'telemovel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'localidade' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        $contacto->update($validated);

        return redirect()->route('contactos.index')->with('success', 'Contacto atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()->route('contactos.index')->with('success', 'Contacto excluído com sucesso!');
    }
}
