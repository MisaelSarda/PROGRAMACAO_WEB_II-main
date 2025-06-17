@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('content')
<h1>Editar Paciente</h1>

<form action="{{ route('pacientes.update', $paciente) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $paciente->nome }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" value="{{ $paciente->email }}" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ $paciente->telefone }}" required>
    </div>
    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
