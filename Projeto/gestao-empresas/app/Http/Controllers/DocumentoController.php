<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with('colaborador.empresa')->get();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $colaboradores = Colaborador::with('empresa')->get();
        return view('documentos.create', compact('colaboradores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'colaborador_id' => 'required|exists:colaboradors,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'validade' => 'required|date',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo')->store('documentos', 'public');
            $dados['arquivo'] = $arquivo;
        }

        Documento::create($dados);

        return redirect()->route('documentos.index')->with('success', 'Documento cadastrado com sucesso.');
    }

    public function edit(Documento $documento)
    {
        $colaboradores = Colaborador::all();
        return view('documentos.edit', compact('documento', 'colaboradores'));
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'colaborador_id' => 'required|exists:colaboradors,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'validade' => 'required|date',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('arquivo')) {
            if ($documento->arquivo) {
                Storage::disk('public')->delete($documento->arquivo);
            }
            $dados['arquivo'] = $request->file('arquivo')->store('documentos', 'public');
        }

        $documento->update($dados);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso.');
    }

    public function destroy(Documento $documento)
    {
        if ($documento->arquivo) {
            Storage::disk('public')->delete($documento->arquivo);
        }

        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso.');
    }
}
