@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Bem-vindo à Dashboard da Clínica Médica</h1>
    <p>Escolha uma opção no menu acima para continuar.</p>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Pacientes</h5>
                    <p class="card-text">Gerencie os pacientes cadastrados no sistema.</p>
                    <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Acessar Pacientes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Médicos</h5>
                    <p class="card-text">Gerencie os médicos cadastrados no sistema.</p>
                    <a href="{{ route('medicos.index') }}" class="btn btn-success">Acessar Médicos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Consultas</h5>
                    <p class="card-text">Gerencie as consultas agendadas.</p>
                    <a href="{{ route('consultas.index') }}" class="btn btn-info">Acessar Consultas</a>
                </div>
            </div>
        </div>
    </div>
@endsection
