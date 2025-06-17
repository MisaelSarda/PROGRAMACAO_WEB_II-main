@extends('layouts.app')

@section('title', 'Novo Paciente')

@section('content')
<h1>Novo Paciente</h1>

<form action="{{ route('pacientes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" required>
    </div>
    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
