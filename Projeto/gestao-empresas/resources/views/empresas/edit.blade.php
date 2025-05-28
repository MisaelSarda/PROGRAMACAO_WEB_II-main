@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Região</h1>

    <form action="{{ route('regioes.update', $regiao->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('regioes.form')

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('regioes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
