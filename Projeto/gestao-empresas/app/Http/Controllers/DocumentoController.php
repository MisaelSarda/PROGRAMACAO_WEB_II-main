<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Regiao;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with(['regiao', 'pessoa'])->latest()->paginate(10);
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $regioes = Regiao::all();
        $pessoas = Pessoa::all();
        return view('documentos.create', compact('regioes', 'pessoas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'validade' => 'required|date',
            'regiao_id' => 'required|exists:regioes,id',
            'pessoa_id' => 'required|exists:pessoas,id',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $documento = new Documento();
        $documento->nome = $request->nome;
        $documento->tipo = $request->tipo;
        $documento->validade = $request->validade;
        $documento->regiao_id = $request->regiao_id;
        $documento->pessoa_id = $request->pessoa_id;

        if ($request->hasFile('arquivo')) {
            $documento->arquivo = $request->file('arquivo')->store('documentos', 'public');
        }

        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento cadastrado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $regioes = Regiao::all();
        $pessoas = Pessoa::all();
        return view('documentos.edit', compact('documento', 'regioes', 'pessoas'));
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'validade' => 'required|date',
            'regiao_id' => 'required|exists:regioes,id',
            'pessoa_id' => 'required|exists:pessoas,id',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $documento->nome = $request->nome;
        $documento->tipo = $request->tipo;
        $documento->validade = $request->validade;
        $documento->regiao_id = $request->regiao_id;
        $documento->pessoa_id = $request->pessoa_id;

        if ($request->hasFile('arquivo')) {
            if ($documento->arquivo) {
                Storage::disk('public')->delete($documento->arquivo);
            }
            $documento->arquivo = $request->file('arquivo')->store('documentos', 'public');
        }

        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy(Documento $documento)
    {
        if ($documento->arquivo) {
            Storage::disk('public')->delete($documento->arquivo);
        }

        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso!');
    }
}
