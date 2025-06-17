@extends('layouts.app')

@section('title', 'Médicos')

@section('content')
<h1>Médicos</h1>
<a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">Novo Médico</a>

<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Buscar médico..." value="{{ request('search') }}">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($medicos as $medico)
        <tr>
            <td>{{ $medico->nome }}</td>
            <td>{{ $medico->especialidade }}</td>
            <td>{{ $medico->telefone }}</td>
            <td>
                <a href="{{ route('medicos.show', $medico) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('medicos.destroy', $medico) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $medicos->links() }}
@endsection
