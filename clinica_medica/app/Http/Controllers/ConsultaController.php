<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(Request $request)
    {
        $consultas = Consulta::with(['paciente', 'medico'])->paginate(10);
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('consultas.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data' => 'required|date',
            'hora' => 'required',
            'observacoes' => 'nullable',
        ]);
        Consulta::create($request->all());
        return redirect()->route('consultas.index');
    }

    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    public function edit(Consulta $consulta)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data' => 'required|date',
            'hora' => 'required',
            'observacoes' => 'nullable',
        ]);
        $consulta->update($request->all());
        return redirect()->route('consultas.index');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index');
    }
}
