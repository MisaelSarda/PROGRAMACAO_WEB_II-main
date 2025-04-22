<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::with('empresa')->get();
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('colaboradores.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:colaboradors',
            'telefone' => 'nullable',
            'cargo' => 'nullable',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        Colaborador::create($request->all());

        return redirect()->route('colaboradores.index')
                         ->with('success', 'Colaborador cadastrado com sucesso.');
    }

    public function edit(Colaborador $colaborador)
    {
        $empresas = Empresa::all();
        return view('colaboradores.edit', compact('colaborador', 'empresas'));
    }

    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:colaboradors,email,' . $colaborador->id,
            'telefone' => 'nullable',
            'cargo' => 'nullable',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $colaborador->update($request->all());

        return redirect()->route('colaboradores.index')
                         ->with('success', 'Colaborador atualizado com sucesso.');
    }

    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();

        return redirect()->route('colaboradores.index')
                         ->with('success', 'Colaborador excluído com sucesso.');
    }
}
