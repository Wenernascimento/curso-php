<?php
// Incluindo as classes
include_once 'Database.php';
include_once 'Produto.php';

// Cria a conexão com o banco de dados
$database = new Database();
$db = $database->getConnection();

// Cria um novo produto
$produto = new Produto($db);

// Criar produto
if (isset($_POST['criar'])) {
    $produto->nome = $_POST['nome'];
    $produto->descricao = $_POST['descricao'];
    $produto->preco = $_POST['preco'];

    if ($produto->criarProduto()) {
        $mensagem = "Produto criado com sucesso!";
        $tipo_mensagem = "success";
    } else {
        $mensagem = "Erro ao criar o produto.";
        $tipo_mensagem = "error";
    }
}

// Ler produto
if (isset($_GET['ler'])) {
    $produto->id = $_GET['id'];
    if ($produto->lerProduto()) {
        $mensagem = "Produto: " . $produto->nome . "<br>Descrição: " . $produto->descricao . "<br>Preço: R$ " . $produto->preco;
        $tipo_mensagem = "info";
    } else {
        $mensagem = "Produto não encontrado.";
        $tipo_mensagem = "error";
    }
}

// Atualizar produto
if (isset($_POST['atualizar'])) {
    $produto->id = $_POST['id_atualizar'];
    $produto->nome = $_POST['nome_atualizar'];
    $produto->descricao = $_POST['descricao_atualizar'];
    $produto->preco = $_POST['preco_atualizar'];

    if ($produto->atualizarProduto()) {
        $mensagem = "Produto atualizado com sucesso!";
        $tipo_mensagem = "success";
    } else {
        $mensagem = "Erro ao atualizar o produto.";
        $tipo_mensagem = "error";
    }
}

// Deletar produto
if (isset($_POST['deletar'])) {
    $produto->id = $_POST['id_deletar'];
    if ($produto->deletarProduto()) {
        $mensagem = "Produto deletado com sucesso!";
        $tipo_mensagem = "success";
    } else {
        $mensagem = "Erro ao deletar o produto.";
        $tipo_mensagem = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            color: #007bff;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
        }

        form input, form button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .message {
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
        }

        .success {
            background-color: #28a745;
            color: white;
        }

        .error {
            background-color: #dc3545;
            color: white;
        }

        .info {
            background-color: #17a2b8;
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistema de Gerenciamento de Produtos</h1>

    <!-- Exibindo mensagens de sucesso ou erro -->
    <?php if (isset($mensagem)): ?>
        <div class="message <?php echo $tipo_mensagem; ?>">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>

    <!-- Formulário para criar um novo produto -->
    <h2>Criar Produto</h2>
    <form method="POST">
        <div class="form-group">
            <input type="text" name="nome" placeholder="Nome do Produto" required>
        </div>
        <div class="form-group">
            <input type="text" name="descricao" placeholder="Descrição do Produto" required>
        </div>
        <div class="form-group">
            <input type="number" name="preco" placeholder="Preço" required>
        </div>
        <button type="submit" name="criar">Criar Produto</button>
    </form>

    <!-- Formulário para ler um produto -->
    <h2>Ler Produto</h2>
    <form method="GET">
        <div class="form-group">
            <input type="number" name="id" placeholder="ID do Produto" required>
        </div>
        <button type="submit" name="ler">Ler Produto</button>
    </form>

    <!-- Formulário para atualizar um produto -->
    <h2>Atualizar Produto</h2>
    <form method="POST">
        <div class="form-group">
            <input type="number" name="id_atualizar" placeholder="ID do Produto" required>
        </div>
        <div class="form-group">
            <input type="text" name="nome_atualizar" placeholder="Novo Nome" required>
        </div>
        <div class="form-group">
            <input type="text" name="descricao_atualizar" placeholder="Nova Descrição" required>
        </div>
        <div class="form-group">
            <input type="number" name="preco_atualizar" placeholder="Novo Preço" required>
        </div>
        <button type="submit" name="atualizar">Atualizar Produto</button>
    </form>

    <!-- Formulário para deletar um produto -->
    <h2>Deletar Produto</h2>
    <form method="POST">
        <div class="form-group">
            <input type="number" name="id_deletar" placeholder="ID do Produto" required>
        </div>
        <button type="submit" name="deletar">Deletar Produto</button>
    </form>
</div>

</body>
</html>
