{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- ► Cards de contagem (SEM componente externo) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold">Pessoas</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">
                        {{ $pessoas }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold">Documentos</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        {{ $documentos }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold">Regiões</h3>
                    <p class="text-3xl font-bold text-purple-600 mt-2">
                        {{ $regioes }}
                    </p>
                </div>
            </div>

            {{-- ► Alerta – aparece só se houver documentos próximos do vencimento --}}
            @if(isset($documentosVencendo) && $documentosVencendo->isNotEmpty())
                <div class="bg-red-50 border-l-4 border-red-600 p-6 rounded shadow">
                    <h3 class="font-semibold text-red-700 mb-2">
                        ⚠️ Documentos que vencem nos próximos 15 dias
                    </h3>

                    <ul class="list-disc list-inside space-y-1 text-sm text-red-800">
                        @foreach($documentosVencendo as $doc)
                            <li>
                                <strong>{{ optional($doc->pessoa)->nome ?? 'Pessoa não encontrada' }}:</strong>
                                {{ $doc->nome }} – {{ \Carbon\Carbon::parse($doc->data_validade)->format('d/m/Y') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
