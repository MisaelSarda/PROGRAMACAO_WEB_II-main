@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-8">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Lista de Pessoas</h1>
        <a href="{{ route('pessoas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Nova Pessoa</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border shadow-sm bg-white rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Nome</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Telefone</th>
                <th class="px-4 py-2 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $pessoa->nome }}</td>
                    <td class="px-4 py-2">{{ $pessoa->email }}</td>
                    <td class="px-4 py-2">{{ $pessoa->telefone }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('pessoas.edit', $pessoa) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('pessoas.destroy', $pessoa) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
