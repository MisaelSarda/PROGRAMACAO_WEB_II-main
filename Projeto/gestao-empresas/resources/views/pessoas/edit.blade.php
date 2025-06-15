@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 mt-8 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Pessoa</h1>

    <form action="{{ route('pessoas.update', $pessoa) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="nome" value="{{ old('nome', $pessoa->nome) }}" class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('nome')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $pessoa->email) }}" class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Telefone</label>
            <input type="text" name="telefone" value="{{ old('telefone', $pessoa->telefone) }}" class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('telefone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('pessoas.index') }}" class="text-gray-600 hover:underline">← Voltar</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
        </div>
    </form>
</div>
@endsection
