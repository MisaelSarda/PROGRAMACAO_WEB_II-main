@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empresas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('empresas.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Empresa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->cnpj }}</td>
                    <td>{{ $empresa->email }}</td>
                    <td>{{ $empresa->telefone }}</td>
                    <td>{{ $empresa->endereco }}</td>
                    <td>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta empresa?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
