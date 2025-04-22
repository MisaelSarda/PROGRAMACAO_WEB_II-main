@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Colaborador</h1>

    <form action="{{ route('colaboradores.update', $colaborador) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $colaborador->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ $colaborador->email }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $colaborador->telefone }}">
        </div>

        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" class="form-control" value="{{ $colaborador->cargo }}">
        </div>

        <div class="mb-3">
            <label for="empresa_id" class="form-label">Empresa</label>
            <select name="empresa_id" class="form-select" required>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $colaborador->empresa_id == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('colaboradores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

