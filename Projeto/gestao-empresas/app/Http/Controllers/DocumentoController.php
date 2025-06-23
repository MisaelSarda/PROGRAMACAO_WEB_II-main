<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Pessoa;
use App\Models\Regiao;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with(['pessoa', 'regiao'])->get();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        $regioes = Regiao::all();
        return view('documentos.create', compact('pessoas', 'regioes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'data_validade' => 'nullable|date',
            'arquivo' => 'nullable|file',
            'pessoa_id' => 'required|exists:pessoas,id',
            'regiao_id' => 'required|exists:regioes,id',
        ]);

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('documentos', 'public');
        }

        Documento::create($data);

        return redirect()->route('documentos.index')->with('success', 'Documento cadastrado com sucesso.');
    }

    public function edit(Documento $documento)
    {
        $pessoas = Pessoa::all();
        $regioes = Regiao::all();
        return view('documentos.edit', compact('documento', 'pessoas', 'regioes'));
    }

    public function update(Request $request, Documento $documento)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'data_validade' => 'nullable|date',
            'arquivo' => 'nullable|file',
            'pessoa_id' => 'required|exists:pessoas,id',
            'regiao_id' => 'required|exists:regioes,id',
        ]);

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('documentos', 'public');
        }

        $documento->update($data);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso.');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso.');
    }
}
