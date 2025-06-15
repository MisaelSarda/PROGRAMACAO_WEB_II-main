<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests\StorePessoaRequest;

class PessoaController extends Controller
{
    public function index()
    {
        return view('pessoas.index', ['pessoas' => Pessoa::all()]);
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(StorePessoaRequest $request)
    {
        Pessoa::create($request->validated());
        return redirect()->route('pessoas.index')->with('success', 'Pessoa cadastrada com sucesso.');
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(StorePessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->validated());
        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso.');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa excluída com sucesso.');
    }
}
