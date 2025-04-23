<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('contatos.update',$contato->id)}}" method="POST">
                        @csrf <!-- Segurança dos dados do Formulário -->
                        @method('put')
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" value="{{$contato->nome}}" required autofocus autocomplete="nome" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <x-input-label id="lemail" for="email"  :value="__('email')" />
                        <x-text-input id="email" name="email" type="text" class="block mt-1 w-full" value="{{$contato->email}}" required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-label id="ltelefone" for="telefone" :value="__('telefone')" />
                        <x-text-input id="telefone" name="telefone" type="text" class="block mt-1 w-full" value="{{$contato->telefone}}" required autofocus autocomplete="telefone" />
                        <x-input-label id="lcidade" for="cidade" :value="__('Cidade')" />
                        <x-text-input id="cidade" name="cidade" type="text" class="block mt-1 w-full" value="{{$contato->cidade}}" required autofocus autocomplete="cidade"/>
                        <x-input-label id="lestado" for="estado" :value="__('Estado')" />
                        <x-text-input id="estado" name="estado" type="text" class="block mt-1 w-full" value="{{$contato->estado}}" required autofocus autocomplete="estado"/>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit" class="ms-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                            <x-secondary-button type="reset" class="ms-4">
                                {{ __('Limpar') }}
                            </x-secondary-button>
                        </div>
                    </form>
                    <br>
                    <a href="{{url('contatos/')}}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>