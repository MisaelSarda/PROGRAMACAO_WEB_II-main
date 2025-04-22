@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Colaboradores</h1>

    <a href="{{ route('colaboradores.create') }}" class="btn btn-primary mb-3">Novo Colaborador</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cargo</th>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->telefone }}</td>
                    <td>{{ $colaborador->cargo }}</td>
                    <td>{{ $colaborador->empresa->nome }}</td>
                    <td>
                        <a href="{{ route('colaboradores.edit', $colaborador) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('colaboradores.destroy', $colaborador) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este colaborador?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
