<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Cards de contagem --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold">Pessoas</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $pessoas }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold">Documentos</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">{{ $documentos }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold">Regiões</h3>
                    <p class="text-3xl font-bold text-purple-600 mt-2">{{ $regioes }}</p>
                </div>
            </div>

            {{-- Alerta de documentos vencendo --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4 text-red-600">Documentos vencendo em até 15 dias</h3>

                @if(isset($documentosVencendo) && $documentosVencendo->count())
                    <table class="w-full table-auto border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="px-4 py-2 border">Pessoa</th>
                                <th class="px-4 py-2 border">Documento</th>
                                <th class="px-4 py-2 border">Data de Validade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documentosVencendo as $documento)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">
                                        {{ optional($documento->pessoa)->nome ?? 'Pessoa não encontrada' }}
                                    </td>
                                    <td class="px-4 py-2 border">{{ $documento->nome }}</td>
                                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($documento->data_validade)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">Nenhum documento com vencimento próximo.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
