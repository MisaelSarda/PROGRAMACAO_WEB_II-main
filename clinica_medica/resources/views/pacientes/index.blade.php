@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
<h1>Pacientes</h1>
<a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Novo Paciente</a>

<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Buscar paciente..." value="{{ request('search') }}">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->nome }}</td>
            <td>{{ $paciente->email }}</td>
            <td>{{ $paciente->telefone }}</td>
            <td>
                <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $pacientes->links() }}
@endsection
