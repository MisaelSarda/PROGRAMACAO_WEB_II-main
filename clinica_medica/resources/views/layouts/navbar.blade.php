<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Clínica Médica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Botão Dashboard -->
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <!-- Links principais -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('medicos.index') }}">Médicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultas.index') }}">Consultas</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Sair</button>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>


