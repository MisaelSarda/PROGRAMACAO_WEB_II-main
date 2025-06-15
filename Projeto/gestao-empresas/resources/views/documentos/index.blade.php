@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-8">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Lista de Documentos</h1>
        <a href="{{ route('documentos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Novo Documento</a>
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
                <th class="px-4 py-2 text-left">Tipo</th>
                <th class="px-4 py-2 text-left">Validade</th>
                <th class="px-4 py-2 text-left">Pessoa</th>
                <th class="px-4 py-2 text-left">Região</th>
                <th class="px-4 py-2 text-left">Arquivo</th>
                <th class="px-4 py-2 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $documento->nome }}</td>
                    <td class="px-4 py-2">{{ $documento->tipo }}</td>
                    <td class="px-4 py-2">{{ $documento->validade }}</td>
                    <td class="px-4 py-2">{{ $documento->pessoa->nome ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $documento->regiao->nome ?? '-' }}</td>
                    <td class="px-4 py-2">
                        @if($documento->arquivo)
                            <a href="{{ asset('storage/' . $documento->arquivo) }}" target="_blank" class="text-blue-600 hover:underline">Ver</a>
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('documentos.edit', $documento) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('documentos.destroy', $documento) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
