<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $validade = $_POST['validade'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $stmt = $conn->prepare("INSERT INTO produtos (nome, validade, preco, quantidade) VALUES (:nome, :validade, :preco, :quantidade)");
    $stmt->execute(['nome' => $nome, 'validade' => $validade, 'preco' => $preco, 'quantidade' => $quantidade]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #4CAF50;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Produto</h1>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="validade">Validade:</label>
            <input type="date" id="validade" name="validade" required>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" step="0.01" name="preco" required>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <button type="submit">Salvar</button>
        </form>
        <a class="back-link" href="index.php">Voltar</a>
    </div>
</body>
</html>
