<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>{{ __('Listagem de Contatos') }}</h2>
                    <br>
                    <a href="{{ url('contatos/create') }}">Criar</a>
                    <br><br>

                    @foreach($contatos as $contato)
                        <p>
                            Contato: 
                            <a href="{{ url('contatos/' . $contato->id) }}">
                                {{ $contato->id }} - {{ $contato->nome }}
                            </a>

                            <a href="{{ url('contatos/' . $contato->id . '/edit') }}">Alterar</a>

                            <span onclick="document.getElementById('contato-excluir-{{ $contato->id }}').submit();" style="cursor:pointer; color:red; margin-left:10px;">Excluir</span>

                            <form id="contato-excluir-{{ $contato->id }}" method="POST" action="{{ route('contatos.destroy', $contato->id) }}" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
