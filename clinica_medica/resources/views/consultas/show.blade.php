@extends('layouts.app')

@section('title', 'Detalhes da Consulta')

@section('content')
<h1>Consulta</h1>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Paciente:</strong> {{ $consulta->paciente->nome }}</li>
    <li class="list-group-item"><strong>Médico:</strong> {{ $consulta->medico->nome }}</li>
    <li class="list-group-item"><strong>Data:</strong> {{ $consulta->data }}</li>
    <li class="list-group-item"><strong>Hora:</strong> {{ $consulta->hora }}</li>
    <li class="list-group-item"><strong>Observações:</strong> {{ $consulta->observacoes }}</li>
</ul>

<a href="{{ route('consultas.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
