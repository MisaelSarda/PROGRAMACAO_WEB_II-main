@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Empresa</h1>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf

        @include('empresas.form')

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
    