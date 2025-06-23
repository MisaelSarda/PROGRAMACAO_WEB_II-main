    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Lista de Documentos</h1>
            <a href="{{ route('documentos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Novo Documento</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded p-4">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">Tipo</th>
                        <th class="px-4 py-2">Validade</th>
                        <th class="px-4 py-2">Pessoa</th>
                        <th class="px-4 py-2">Região</th>
                        <th class="px-4 py-2">Arquivo</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentos as $documento)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $documento->nome }}</td>
                            <td class="px-4 py-2">{{ $documento->tipo }}</td>
                            <td class="px-4 py-2">
                                {{ $documento->data_validade ? date('d/m/Y', strtotime($documento->data_validade)) : '-' }}
                            </td>
                            <td class="px-4 py-2">{{ $documento->pessoa->nome ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $documento->regiao->nome ?? '-' }}</td>
                            <td class="px-4 py-2">
                                @if ($documento->arquivo)
                                    <a href="{{ asset('storage/' . $documento->arquivo) }}" target="_blank" class="text-blue-500 underline">Ver</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('documentos.edit', $documento->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                                <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" class="inline">
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
