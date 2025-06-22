@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 mt-8 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Cadastrar Documento</h1>

    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}" class="w-full border rounded px-3 py-2 shadow-sm">
            @error('nome')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tipo</label>
            <input type="text" name="tipo" value="{{ old('tipo') }}" class="w-full border rounded px-3 py-2 shadow-sm">
            @error('tipo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Data de Validade</label>
            <input type="date" name="data_validade" value="{{ old('data_validade') }}" class="w-full border rounded px-3 py-2 shadow-sm">
            @error('data_validade')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Arquivo</label>
            <input type="file" name="arquivo" class="w-full border rounded px-3 py-2 shadow-sm">
            @error('arquivo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Pessoa</label>
            <select name="pessoa_id" class="w-full border rounded px-3 py-2 shadow-sm">
                @foreach($pessoas as $pessoa)
                    <option value="{{ $pessoa->id }}" {{ old('pessoa_id') == $pessoa->id ? 'selected' : '' }}>
                        {{ $pessoa->nome }}
                    </option>
                @endforeach
            </select>
            @error('pessoa_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Região</label>
            <select name="regiao_id" class="w-full border rounded px-3 py-2 shadow-sm">
                @foreach($regioes as $regiao)
                    <option value="{{ $regiao->id }}" {{ old('regiao_id') == $regiao->id ? 'selected' : '' }}>
                        {{ $regiao->nome }}
                    </option>
                @endforeach
            </select>
            @error('regiao_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('documentos.index') }}" class="text-gray-600 hover:underline">← Voltar</a>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Salvar</button>
        </div>
    </form>
</div>
@endsection
