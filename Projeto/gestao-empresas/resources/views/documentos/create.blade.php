@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cadastrar Documento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Documento</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo (Opcional)</label>
            <input type="text" name="tipo" id="tipo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="validade" class="form-label">Prazo de Validade</label>
            <input type="date" name="validade" id="validade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="regiao_id" class="form-label">Região</label>
            <select name="regiao_id" id="regiao_id" class="form-control" required>
                <option value="">Selecione uma região</option>
                @foreach ($regioes as $regiao)
                    <option value="{{ $regiao->id }}">{{ $regiao->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pessoa_id" class="form-label">Pessoa</label>
            <select name="pessoa_id" id="pessoa_id" class="form-control" required>
                <option value="">Selecione uma pessoa</option>
                @foreach ($pessoas as $pessoa)
                    <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (PDF, JPG, PNG até 2MB)</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
