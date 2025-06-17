@extends('layouts.app')

@section('title', 'Nova Consulta')

@section('content')
<h1>Nova Consulta</h1>

<form action="{{ route('consultas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="paciente_id" class="form-label">Paciente</label>
        <select name="paciente_id" class="form-control" required>
            @foreach ($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="medico_id" class="form-label">Médico</label>
        <select name="medico_id" class="form-control" required>
            @foreach ($medicos as $medico)
                <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Data</label>
        <input type="date" name="data" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <input type="time" name="hora" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="observacoes" class="form-label">Observações</label>
        <textarea name="observacoes" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
