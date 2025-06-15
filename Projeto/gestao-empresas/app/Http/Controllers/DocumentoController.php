<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Pessoa;
use App\Models\Regiao;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentoRequest;

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

    public function store(StoreDocumentoRequest $request)
    {
        $data = $request->validated();
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

    public function update(StoreDocumentoRequest $request, Documento $documento)
    {
        $data = $request->validated();
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
