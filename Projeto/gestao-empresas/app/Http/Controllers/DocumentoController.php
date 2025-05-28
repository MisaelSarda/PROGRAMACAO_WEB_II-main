<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with('empresa')->latest()->paginate(10);
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('documentos.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'validade' => 'required|date',
            'empresa_id' => 'required|exists:empresas,id',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $documento = new Documento();
        $documento->nome = $request->nome;
        $documento->tipo = $request->tipo;
        $documento->validade = $request->validade;
        $documento->empresa_id = $request->empresa_id;

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
        $empresas = Empresa::all();
        return view('documentos.edit', compact('documento', 'empresas'));
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'validade' => 'required|date',
            'empresa_id' => 'required|exists:empresas,id',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $documento->nome = $request->nome;
        $documento->tipo = $request->tipo;
        $documento->validade = $request->validade;
        $documento->empresa_id = $request->empresa_id;

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
