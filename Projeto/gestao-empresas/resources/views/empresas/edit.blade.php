@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empresa</h1>

    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('empresas.form')

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
