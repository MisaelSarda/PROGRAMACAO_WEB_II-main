@extends('layouts.app')

@section('title', 'Detalhes do Paciente')

@section('content')
<h1>Paciente: {{ $paciente->nome }}</h1>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Email:</strong> {{ $paciente->email }}</li>
    <li class="list-group-item"><strong>Telefone:</strong> {{ $paciente->telefone }}</li>
</ul>

<a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
