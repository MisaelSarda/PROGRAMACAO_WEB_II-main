<div class="mb-3">
    <label for="nome" class="form-label">Nome da Região:</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $regiao->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição:</label>
    <input type="text" name="descricao" class="form-control" value="{{ old('descricao', $regiao->descricao ?? '') }}">
</div>
