@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-6 mt-8 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Pessoas</h1>
        <a href="{{ route('pessoas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Nova Pessoa</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 border">Nome</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Telefone</th>
                    <th class="px-4 py-2 border">Vulnerabilidade</th>
                    <th class="px-4 py-2 border">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pessoas as $pessoa)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $pessoa->nome }}</td>
                        <td class="px-4 py-2 border">{{ $pessoa->email }}</td>
                        <td class="px-4 py-2 border">{{ $pessoa->telefone }}</td>
                        <td class="px-4 py-2 border">{{ $pessoa->vulnerabilidade }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                            <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Nenhuma pessoa cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
