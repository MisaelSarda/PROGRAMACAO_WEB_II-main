@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 mt-8 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Cadastrar Pessoa</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pessoas.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}" class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('nome')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Telefone</label>
            <input type="text" name="telefone" value="{{ old('telefone') }}" class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('telefone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('pessoas.index') }}" class="text-gray-600 hover:underline">← Voltar</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
        </div>
    </form>
</div>
@endsection
