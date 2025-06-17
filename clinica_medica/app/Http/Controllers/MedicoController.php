<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index(Request $request)
    {
        $query = Medico::query();
        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }
        $medicos = $query->paginate(10);
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'especialidade' => 'required',
            'telefone' => 'required',
        ]);
        Medico::create($request->all());
        return redirect()->route('medicos.index');
    }

    public function show(Medico $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nome' => 'required',
            'especialidade' => 'required',
            'telefone' => 'required',
        ]);
        $medico->update($request->all());
        return redirect()->route('medicos.index');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();
        return redirect()->route('medicos.index');
    }
}
