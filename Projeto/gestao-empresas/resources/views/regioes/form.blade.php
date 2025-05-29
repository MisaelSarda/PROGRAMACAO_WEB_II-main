<div class="mb-3">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $regiao->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $regiao->email ?? '') }}">
</div>

<div class="mb-3">
    <label for="telefone" class="form-label">Telefone:</label>
    <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $regiao->telefone ?? '') }}">
</div>

<div class="mb-3">
    <label for="endereco" class="form-label">Endereço:</label>
    <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $regiao->endereco ?? '') }}">
</div>
