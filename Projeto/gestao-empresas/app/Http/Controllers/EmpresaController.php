<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required|unique:empresas',
        ]);

        Empresa::create($request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa cadastrada com sucesso.');
    }

    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required|unique:empresas,cnpj,'.$empresa->id,
        ]);

        $empresa->update($request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso.');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa deletada com sucesso.');
    }
}
