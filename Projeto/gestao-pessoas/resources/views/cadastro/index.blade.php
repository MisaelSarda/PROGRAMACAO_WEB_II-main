<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Entidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Selecione uma opção de cadastro:</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('empresas.create') }}" class="text-blue-600 hover:underline">Cadastrar Empresa</a>
                    </li>
                    {{-- Exemplo de outros cadastros se já existirem --}}
                    @if (Route::has('funcionarios.create'))
                    <li>
                        <a href="{{ route('funcionarios.create') }}" class="text-blue-600 hover:underline">Cadastrar Funcionário</a>
                    </li>
                    @endif

                    @if (Route::has('documentos.create'))
                    <li>
                        <a href="{{ route('documentos.create') }}" class="text-blue-600 hover:underline">Cadastrar Documento</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
