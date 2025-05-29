<?php

namespace App\Http\Controllers;

use App\Models\Regiao;
use Illuminate\Http\Request;

class RegiaoController extends Controller
{
    public function index()
    {
        $regioes = Regiao::all();
        return view('regioes.index', compact('regioes'));
    }

    public function create()
    {
        return view('regioes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:regioes',
        ]);

        Regiao::create($request->all());
        return redirect()->route('regioes.index')->with('success', 'Região cadastrada com sucesso.');
    }

    public function edit(Regiao $regiao)
    {
        return view('regioes.edit', compact('regiao'));
    }

    public function update(Request $request, Regiao $regiao)
    {
        $request->validate([
            'nome' => 'required|unique:regioes,nome,' . $regiao->id,
        ]);

        $regiao->update($request->all());
        return redirect()->route('regioes.index')->with('success', 'Região atualizada com sucesso.');
    }

    public function destroy(Regiao $regiao)
    {
        $regiao->delete();
        return redirect()->route('regioes.index')->with('success', 'Região deletada com sucesso.');
    }
}
