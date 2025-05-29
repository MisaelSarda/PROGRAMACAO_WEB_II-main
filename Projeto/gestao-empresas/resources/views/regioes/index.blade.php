@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Regiões</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('regioes.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Região</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regioes as $regiao)
                <tr>
                    <td>{{ $regiao->nome }}</td>
                    <td>{{ $regiao->email }}</td>
                    <td>{{ $regiao->telefone }}</td>
                    <td>{{ $regiao->endereco }}</td>
                    <td>
                        <a href="{{ route('regioes.edit', $regiao->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('regioes.destroy', $regiao->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta região?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
