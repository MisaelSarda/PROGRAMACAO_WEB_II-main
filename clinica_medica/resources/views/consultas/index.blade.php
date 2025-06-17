@extends('layouts.app')

@section('title', 'Consultas')

@section('content')
<h1>Consultas</h1>
<a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Nova Consulta</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($consultas as $consulta)
        <tr>
            <td>{{ $consulta->paciente->nome }}</td>
            <td>{{ $consulta->medico->nome }}</td>
            <td>{{ $consulta->data }}</td>
            <td>{{ $consulta->hora }}</td>
            <td>
                <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('consultas.destroy', $consulta) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $consultas->links() }}
@endsection
