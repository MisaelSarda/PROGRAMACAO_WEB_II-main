<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Paciente::query();
        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }
        $pacientes = $query->paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:pacientes',
            'telefone' => 'required',
        ]);
        Paciente::create($request->all());
        return redirect()->route('pacientes.index');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:pacientes,email,' . $paciente->id,
            'telefone' => 'required',
        ]);
        $paciente->update($request->all());
        return redirect()->route('pacientes.index');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index');
    }
}
