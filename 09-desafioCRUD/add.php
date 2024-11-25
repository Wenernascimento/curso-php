<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $bairro = $_POST['bairro'];

    $conn->query("INSERT INTO clientes (nome, email, sexo, bairro) VALUES ('$nome', '$email', '$sexo', '$bairro')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
        /* Estilo para o fundo da página */
        body {
            background: url('padaria5.png') no-repeat center center fixed; /* Caminho da imagem de fundo */
            background-size: cover; /* A imagem vai cobrir toda a tela */
            font-family: 'Arial', sans-serif;
            color: #0000ff; /* Cor do texto */
            margin: 0;
            padding: 0;
        }

        /* Estilo para o título */
        h1 {
            text-align: center;
            font-size: 36px;
            margin-top: 50px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            color: #fff; /* Título em branco para contrastar com o fundo */
        }

        /* Estilo para o formulário */
        form {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco com opacidade */
            padding: 20px;
            width: 300px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Estilo para os campos de input */
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Estilo para o botão */
        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Estilo para os rótulos do formulário */
        form label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Adicionar Novo Cliente</h1>
    <form method="post" onsubmit="return validarFormulario()">
        <label>Nome: <input type="text" name="nome"></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Sexo: 
            <select name="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </label><br>
        <label>Bairro: <input type="text" name="bairro" required></label><br>
        <button type="submit">Salvar</button>
    </form>
    <script src="./js/script.js"></script>
</body>
</html>
