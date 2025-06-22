@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-8">
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800">Lista de Documentos</h1>
            <a href="{{ route('documentos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Novo Documento
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 text-left">Nome</th>
                    <th class="border px-4 py-2 text-left">Tipo</th>
                    <th class="border px-4 py-2 text-left">Validade</th>
                    <th class="border px-4 py-2 text-left">Pessoa</th>
                    <th class="border px-4 py-2 text-left">Região</th>
                    <th class="border px-4 py-2 text-left">Arquivo</th>
                    <th class="border px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $documento->nome }}</td>
                        <td class="border px-4 py-2">{{ $documento->tipo }}</td>
                        <td class="border px-4 py-2">
                            {{ $documento->data_validade ? date('d/m/Y', strtotime($documento->data_validade)) : '-' }}
                        </td>
                        <td class="border px-4 py-2">{{ $documento->pessoa->nome ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $documento->regiao->nome ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            @if($documento->arquivo)
                                <a href="{{ asset('storage/' . $documento->arquivo) }}" target="_blank" class="text-blue-600 hover:underline">Ver</a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('documentos.edit', $documento) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('documentos.destroy', $documento) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Deseja excluir este documento?')" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Nenhum documento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
