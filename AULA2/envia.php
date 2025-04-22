<?php
$metodo = $_SERVER["REQUEST_METHOD"];

$cabecalhos = getallheaders();

$dados = ($metodo === "POST") ? $_POST : $_GET;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Envio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            background: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #444;
        }
        pre {
            text-align: left;
            background: #eee;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Dados Recebidos</h2>
    <p><strong>Método Utilizado:</strong> <?php echo $metodo; ?></p>

    <h3>Dados Enviados:</h3>
    <pre><?php print_r($dados); ?></pre>

    <h3>Cabeçalhos da Requisição:</h3>
    <pre><?php print_r($cabecalhos); ?></pre>
</div>

</body>
</html>
