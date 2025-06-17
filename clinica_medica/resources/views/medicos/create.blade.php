@extends('layouts.app')

@section('title', 'Novo Médico')

@section('content')
<h1>Novo Médico</h1>

<form action="{{ route('medicos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="especialidade" class="form-label">Especialidade</label>
        <input type="text" name="especialidade" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" required>
    </div>
    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
