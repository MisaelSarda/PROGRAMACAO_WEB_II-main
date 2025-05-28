@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Região</h1>

    <form action="{{ route('regioes.store') }}" method="POST">
        @csrf

        @include('regioes.form')

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('regioes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
