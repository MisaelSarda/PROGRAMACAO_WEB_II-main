@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Lista de Pessoas</h1>
        <a href="{{ route('pessoas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova Pessoa</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="w-1/4 px-4 py-2">Nome</th>
                    <th class="w-1/4 px-4 py-2">Email</th>
                    <th class="w-1/4 px-4 py-2">Telefone</th>
                    <th class="w-1/4 px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pessoas as $pessoa)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $pessoa->nome }}</td>
                        <td class="px-4 py-2">{{ $pessoa->email }}</td>
                        <td class="px-4 py-2">{{ $pessoa->telefone }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                            <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
