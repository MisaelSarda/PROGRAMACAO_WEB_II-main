<?php

namespace App\Http\Controllers;

use App\Models\Regiao;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegiaoRequest;

class RegiaoController extends Controller
{
    public function index()
    {
        return view('regioes.index', ['regioes' => Regiao::all()]);
    }

    public function create()
    {
        return view('regioes.create');
    }

    public function store(StoreRegiaoRequest $request)
    {
        Regiao::create($request->validated());
        return redirect()->route('regioes.index')->with('success', 'Região cadastrada com sucesso.');
    }

    public function edit(Regiao $regiao)
    {
        return view('regioes.edit', compact('regiao'));
    }

    public function update(StoreRegiaoRequest $request, Regiao $regiao)
    {
        $regiao->update($request->validated());
        return redirect()->route('regioes.index')->with('success', 'Região atualizada com sucesso.');
    }

    public function destroy(Regiao $regiao)
    {
        $regiao->delete();
        return redirect()->route('regioes.index')->with('success', 'Região excluída com sucesso.');
    }
}
