<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <h1>Formulário de Cadastro</h1>

    <div class="container">
        <div class="form-box">
            <h2>Enviar via GET</h2>
            <form action="envia.php" method="GET">
                <label for="nome_get">Nome:</label>
                <input type="text" id="nome_get" name="nome" required>

                <label for="telefone_get">Telefone:</label>
                <input type="tel" id="telefone_get" name="telefone" required>

                <label for="email_get">E-mail:</label>
                <input type="email" id="email_get" name="email" required>

                <label for="mensagem_get">Mensagem:</label>
                <textarea id="mensagem_get" name="mensagem" required></textarea>

                <button type="submit">Enviar via GET</button>
            </form>
        </div>

        <div class="form-box">
            <h2>Enviar via POST</h2>
            <form action="envia.php" method="POST">
                <label for="nome_post">Nome:</label>
                <input type="text" id="nome_post" name="nome" required>

                <label for="telefone_post">Telefone:</label>
                <input type="tel" id="telefone_post" name="telefone" required>

                <label for="email_post">E-mail:</label>
                <input type="email" id="email_post" name="email" required>

                <label for="mensagem_post">Mensagem:</label>
                <textarea id="mensagem_post" name="mensagem" required></textarea>

                <button type="submit">Enviar via POST</button>
            </form>
        </div>
    </div>

</body>
</html>
