@extends('layouts.app')

@section('title', 'Editar Médico')

@section('content')
<h1>Editar Médico</h1>

<form action="{{ route('medicos.update', $medico) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $medico->nome }}" required>
    </div>
    <div class="mb-3">
        <label for="especialidade" class="form-label">Especialidade</label>
        <input type="text" name="especialidade" class="form-control" value="{{ $medico->especialidade }}" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ $medico->telefone }}" required>
    </div>
    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
