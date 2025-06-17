@extends('layouts.app')

@section('title', 'Detalhes do Médico')

@section('content')
<h1>Médico: {{ $medico->nome }}</h1>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Especialidade:</strong> {{ $medico->especialidade }}</li>
    <li class="list-group-item"><strong>Telefone:</strong> {{ $medico->telefone }}</li>
</ul>

<a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
